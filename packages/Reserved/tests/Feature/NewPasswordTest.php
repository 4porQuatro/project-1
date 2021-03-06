<?php


namespace Packages\Reserved\tests\Feature;


use App\Models\Field;
use App\Models\Form;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use Packages\Reserved\App\Constants\FormTypes;
use Packages\Reserved\App\Models\ReservedArea;
use Tests\TestCase;

class NewPasswordTest extends TestCase {

    use DatabaseMigrations;
    public $reserved;
    public $user;
    public $old_password;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->reserved = ReservedArea::factory()->create(['prefix'=>'prefix_test']);

        $this->old_password = '12345678';

        $this->user = User::factory()->create([
            'reserved_area_id'=>json_encode($this->reserved->id),
            'password'=>Hash::make($this->old_password)
        ]);
    }

    /** @test */
    public function a_user_can_set_a_new_password()
    {
        $this->withoutExceptionHandling();
        $this->actingAs($this->user);
        $form = $this->generateNewPasswordForm();
        $this->generateRequiredFields($form);

        $old_password = $this->user->password;

        $data = [
            'cms_form_id'=>$form->id,
            'password'=>$this->old_password,
            'new_password'=>'recoreco',
            'new_password_confirmation'=>'recoreco'
        ];

        $response = $this->patch($form->end_point, $data);

        $response->assertStatus(302);

        $this->assertDatabaseMissing('users', ['email'=>$this->user->email, 'password'=>$old_password]);
    }

    /**
     * @dataProvider incorrectData
     */
    public function test_change_password_erros($type, $data)
    {
        $this->actingAs($this->user);
        $form = $this->generateNewPasswordForm();
        $this->generateRequiredFields($form);

        $old_password = $this->user->password;

        $data['cms_form_id'] = $form->id;

        $response = $this->patch($form->end_point, $data);

        $response->assertStatus(302);
        $response->assertSessionHasErrors($type);

        $this->assertDatabaseHas('users', ['email'=>$this->user->email, 'password'=>$old_password]);
    }

    public function incorrectData()
    {
        return array(
            ['password', ['password'=>'wrong password', 'new_password'=>'recoreco', 'new_password_confirmation'=>'recoreco']],
            ['new_password', ['password'=>$this->old_password, 'new_password'=>'reco', 'new_password_confirmation'=>'recoreco']],
            ['new_password', ['password'=>$this->old_password, 'new_password'=>'recoreco', 'new_password_confirmation'=>'reco']],
        );
    }



    /**
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed
     */
    private function generateNewPasswordForm()
    {
        $form = Form::factory()->create(['type' => FormTypes::NEW_PASSWORD, 'formable_type' => ReservedArea::class, 'formable_id' => $this->reserved->id]);

        return $form;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $form
     * @return mixed
     */
    private function generateRequiredFields(\Illuminate\Database\Eloquent\Model $form)
    {
        foreach ($this->reserved->formRequiredFields()[FormTypes::NEW_PASSWORD] as $inputs)
        {
            $data = ['name' => $inputs['name'],'label'=>$inputs['label'], 'type' => $inputs['type'], 'rules' => $inputs['rules'], 'editable' => $inputs['editable']];
            $form->fields()->create($data);
        }

        return $inputs;
    }

    /**
     * @param array $registration_form
     * @param \Illuminate\Database\Eloquent\Model $form
     * @return array
     */
    private function generateData(\Illuminate\Database\Eloquent\Model $form): array
    {
        foreach ($this->reserved->formRequiredFields()[FormTypes::REGISTER] as $inputs)
        {
            $registration_form[$inputs['name']] = 'email@email.pt';
        }
        $registration_form['cms_form_id'] = $form->id;

        return $registration_form;
    }


}
