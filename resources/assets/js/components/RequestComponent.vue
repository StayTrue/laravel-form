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
		  	<div class="form-check">
		    	<input type="checkbox" class="form-check-input" id="exampleCheck1">
		    	<label class="form-check-label" for="exampleCheck1">Check me out</label>
		  	</div>
		  	<div class="form-group">
			    <label for="exampleFormControlSelect1">Example select</label>
			    <select class="form-control" v-model = "tariff" @change = "daysUpdate" id="exampleFormControlSelect1">
			      	<option value = "1">1</option>
			      	<option value = "2">2</option>
			      	<option value = "3">3</option>
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
    			});
    		},
    		daysUpdate() {
    			console.log(this.tariff);
    		}
    	},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>