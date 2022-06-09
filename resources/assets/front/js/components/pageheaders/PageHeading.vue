<template>
    <div class="page-heading">
        <h1>HLW</h1>
        <img :src="src" :alt="alt" height="100px">
    </div>
</template>
<script>
export default{
    props:{
        src: string,
        title: string,
        alt: string,
    }
}
</script>