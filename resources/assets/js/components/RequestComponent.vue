<template>
	<div>
		<form v-on:submit.prevent="onSubmit">
			<div class="form-group">
			    <label for="name">Имя</label>
			    <input v-model = "name" type="text" required class="form-control" id="name" placeholder="Введите ваше имя">
			</div>
		  	<div class="form-group">
		    	<label for="exampleInputPassword1">Телефон</label>
		    	<input v-model = "phone" v-mask="'+#(###)###-##-##'" type="text" class="form-control" id="phone" placeholder="Введите ваш телефон">
		  	</div>
		  	<div class="form-group">
			    <label for="exampleFormControlSelect1">Выберите удобный тариф</label>
			    <select class="form-control" v-model = "tariff" @change = "daysUpdate" id="exampleFormControlSelect1">
			      	<option value = "1">1</option>
			      	<option value = "2">2</option>
			      	<option value = "3">3</option>
			    </select>
			</div>
            <div class = "form-group">
                <label for="days">Выберите день доставки</label>
                <select class = "form-control" v-model = "chosen_day">
                    <option  v-for = "day in delivery_days" :value="day.id">{{ day.name }}</option>
                </select>
            </div>
		  	<button type="submit" class="btn btn-primary">Submit</button>
		</form>
		<modal ref = "myModalRef"></modal>
	</div>
</template>

<script>
    import Modal from '../components/ModalComponent.vue';
    import axios from 'axios';
    import {mask} from 'vue-the-mask';
    export default {
    	directives: {mask},
    	components: {
    		'modal': Modal
    	},
    	data: function(){
    		return {
	    		name: '',
	    		phone: '',
	    		tariff: '',
	    		chosen_day: '',
	    		delivery_days: []
    		}
    	},
    	methods: {
    		onSubmit() {
    			axios.post('make-order', {
    				name: this.name, 
    				phone: this.phone,
    			}).then((response) => {
    				this.$refs.myModalRef.showModal();
                    this.$refs.myModalRef.title = "Ваш заказ оформлен";
    			});
    		},
    		daysUpdate() {
    			console.log(this.tariff);
                axios.get('update-delivery-days').then((response) => {
                    this.delivery_days = response.data.days;
                    console.log(response.data);
                });
    		}
    	},
        mounted() {
            this.delivery_days = [{id :1 , name: 'blahblah'}];   
            console.log('Component mounted.')
        }
    }
</script>