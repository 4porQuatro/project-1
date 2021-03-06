<?php

namespace Packages\Documents\tests\Unit;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Packages\Documents\App\Models\Document;
use Tests\TestCase;

class DocumentTest extends TestCase
{
    use DatabaseMigrations;

    public $document;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->document = Document::factory()->create();
    }

    /** @test */
    public function has_a_name()
    {
        $this->assertNotNull($this->document->name);
        $this->assertIsString($this->document->name);
    }

    /** @test */
    public function has_a_priority()
    {
        $this->assertNotNull($this->document->priority);
        $this->assertIsInt($this->document->priority);
    }

    /** @test */
    public function has_a_paths()
    {
        $this->assertNotNull($this->document->paths);
        $this->assertIsArray($this->document->paths);
    }

    /** @test */
    public function has_a_path()
    {
        $this->assertNotNull($this->document->path);
    }

    /** @test */
    public function can_have_empty_documentable_relation()
    {
        $this->assertEmpty($this->document->documentable);
    }

    /**
     *  @dataProvider modelsToRelate
     */
    public function test_can_have_a_documentable_relation_with_any_model($model)
    {
        $model_to_relate = $model::factory()->create();

        $document = Document::factory()->create([
            'documentable_type'=>$model,
            'documentable_id'=>$model_to_relate->id
        ]);

        $this->assertNotEmpty($document->documentable);
        $this->assertEquals($document->documentable->id, $model_to_relate->id);
        $this->assertInstanceOf($model, $document->documentable);
    }

    /** @test */
    public function can_have_empty_categories()
    {
        $this->assertEmpty($this->document->categories);
        $this->assertInstanceOf(Collection::class, $this->document->categories);
    }

    /** @test */
    public function can_have_multiple_categories()
    {
        $categories = Category::factory(5)->create();
        $this->document->categories()->sync($categories->pluck('id')->toArray());

        $this->assertNotEmpty($this->document->categories);
        $this->assertInstanceOf(Collection::class, $this->document->categories);
        $this->assertInstanceOf(Category::class, $this->document->categories->first());
    }

    public function modelsToRelate()
    {
        return array(
            [Article::class],
            [Category::class],
            [User::class],
        );
    }
}
