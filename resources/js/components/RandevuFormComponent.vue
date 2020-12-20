<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" class="form-control" v-model="name" placeholder="Ad">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                    <input type="text" class="form-control" v-model="email" placeholder="e-mail">
                </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                    <input type="text" class="form-control" v-model="phone" placeholder="telefon">
                </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="date" @change="selectDate" v-model="date" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <ul class="select-time-ul">
                    <li v-for="item in workingHours" class="select-time">
                        <input type="radio" v-model="workingHour">
                        <span>{{ item.hours }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <textarea class="form-control" v-model="text"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <button v-on:click="store" class="btn btn-success">Randevu Oluştur</button>
            </div>
        </div>

    </div>
    </div>
</template>

<script>
export default {
    name: "RandevuFormComponent",

    data() {
        return {
            name: 'ww',
            email: '',
            phone: '',
            date: new Date().toISOString().slice(0,10),
            text:'',
            workingHours: [],
            workingHour: ''
        }
    },

    methods:{
        store: function (){
            console.log("tıklandı");
            var date = new Date();
        },

        selectDate: function(){
            console.log('tarih değişti');
        }
    },

    mounted() {
        axios.get('http://randevu.local/api/working-hours')
        .then((res)=>{
            console.log(res);
            this.workingHours = res.data;
        })

    }
}
</script>

<style scoped>

</style>
