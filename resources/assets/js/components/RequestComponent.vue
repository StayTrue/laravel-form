<template>  
    <div class = "container request-container d-flex justify-content-center">
        <div class = "col-12 col-md-10 col-lg-8 px-0">
            <b-card title="Оформление заказа" img-src="https://growfood.pro/static/images/main2.c8959e0.jpg" img-alt="RequestFood" img-top tag="article" class="mb-2">
        		<b-form v-on:submit.prevent="onSubmit">
        			<b-form-group id = "nameGroup" label = "Имя" label-for = "name">
        			    <b-form-input :state="!$v.name.$invalid" v-model = "name" type="text" required  id="name" placeholder="Введите ваше имя"></b-form-input>
        			</b-form-group>
        		  	<b-form-group>
        		    	<label for="exampleInputPassword1">Телефон</label>
        		    	<b-form-input :state="!$v.phone.$invalid" v-model = "phone" v-mask="'+7(###)###-##-##'" type="text" required id="phone" placeholder="+7("></b-form-input>
        		  	</b-form-group>
        		  	<b-form-group label = "Тариф">
        			    <b-form-select :state="!$v.tariff_id.$invalid" v-model = "tariff_id" :disabled = "isPending" required :value = "null" @input = "daysUpdate" id="exampleFormControlSelect1">
                            <option v-for = "tariff in tariffs" :value = "tariff.id">{{ tariff.name }}</option>
                            <option slot = "first" :value = "null">Выберите тариф</option>
        			    </b-form-select>
        			</b-form-group>
                    <b-form-group label = "День доставки" v-if = "show">
                        <b-form-select  :state="!$v.chosen_day.$invalid" :value = "null" v-model = "chosen_day" :disabled = "isPending">
                            <option v-for = "delivery_day in delivery_days" :value = "delivery_day.id">{{ delivery_day.weekday }}</option>
                            <option slot = "first" :value = "null">Выберите день доставки</option>
                        </b-form-select>
                    </b-form-group>
                    <b-form-group id = "addressGroup" label = "Адрес доставки" label-for = "address">
                        <b-form-input :state = "!$v.address.$invalid" v-model = "address" type = "text" id = "address" placeholder = "Введите адрес доставки"></b-form-input>
                    </b-form-group>
        		  	<b-button type="submit" variant="primary" :disabled="$v.$invalid">Сделать заказ</b-button>
        		</b-form>
        		<modal ref = "myModalRef"></modal>
            </b-card>
        </div>
    </div>
</template>

<script>
    import Modal from '../components/ModalComponent.vue'
    import axios from 'axios'
    import {mask} from 'vue-the-mask'
    import { validationMixin } from "vuelidate"
    import { required, minLength, maxLength, between, requiredIf, minValue} from 'vuelidate/lib/validators'
    export default {
    	directives: {mask},
    	components: {
    		'modal': Modal
    	},
    	data: function(){
    		return {
	    		name: '',
	    		phone: '',
                tariffs: [],
                tariff: {
                    id: '',
                    name: '',
                    price: '',
                },
	    		tariff_id: null,
	    		chosen_day: null,
	    		delivery_days: [],
                delivery_day: {
                    id: '',
                    weekday: '',
                },
                isPending: false,
                address: '',
                show: false
    		}
    	},
        mixins: [
            validationMixin
        ],
        validations: {
            chosen_day: {
                required
            },
            tariff_id: {
                required
            },
            name: {
                required,
                minLength: minLength(4)
            },
            phone: {
                required,
                minLength: minLength(16)
            },
            address: {
                required,
                minLength: minLength(15)
            }
        },
    	methods: {
    		onSubmit() {
    			axios.post('make-order', {
    				name: this.name, 
    				phone: this.phone,
                    address: this.address,
                    tariff_id: this.tariff_id,
                    day: this.chosen_day
    			}).then((response) => {
    				this.$refs.myModalRef.showModal();
                    this.$refs.myModalRef.title = "Cпасибо";
                    this.$refs.myModalRef.text = "Ваш заказ оформлен.<br>Мы свяжемся с вами в ближайшее время";
    			}).catch((response) => {
                    this.$refs.myModalRef.showModal();
                    this.$refs.myModalRef.title = "Простите";
                    this.$refs.myModalRef.text = "Что-то пошло не так...<br>Повторите ваш заказ позже";
                });
                this.name = ''
                this.phone = ''
                this.tariff_id = null
                this.chosen_day = null
                this.address = null
    		},
    		daysUpdate() {
                this.show = true;
                if (this.tariff_id) {
                    this.isPending = true;
                    const csrfToken = document.querySelector("meta[name=csrf-token]").content;
                        axios.defaults.headers.common['X-CSRF-Token'] = csrfToken;
                        axios.post('get-delivery-days', {id: this.tariff_id}).then((response) => {
                        this.delivery_days = response.data;
                        this.isPending = false;
                    }).catch(function (error) {
                        console.log(error);
                    });
                } else {
                    this.show = false;
                }
    		}
    	},
        mounted() {
            this.isPending = true;
            axios.get('get-tariffs').then((response) => {
                this.tariffs = response.data;
                this.isPending = false;
            });
        }
    }
</script>
<style>
    .request-container {
        margin-top: 50px;
        margin-bottom: 100px;
    }
</style>