<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Contact Component</div>

                    <div class="card-body">
                        Hi, Online Web tutor. I am Contact Us Page
                              <h2>  {{message}} </h2>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
// import About from './AboutComponent.vue'
    export default {
        data() {
            return {
                message: 'Hello ppl, This is a var from Contact us ,finally'
            }},
        mounted() {}

    }
    
</script>
