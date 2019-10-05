<template>
    <div>

 hello

    </div>
</template>

<script>

    export default {
        name: "msdockerdashboard",
        methods:{
            setHtml(data) {
                this.data.push(data);
                this.liveComponent = new Vue({
                    data: {
                        message: '{}'
                    },
                    el: '#mswindow'+this.index,
                    template:data,
                });
                console.log(data);
            },
            setError(data){},

        },
        data:function () {
            return{
                liveComponent:null,
                data:null

            };
        }
    }
</script>

<style scoped>

</style>
