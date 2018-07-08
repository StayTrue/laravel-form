<template>
	<div class = "container request-container d-flex justify-content-center">
        <div class = "col-12">
  			<b-table class = "requests-table" responsive striped hover :items="requests" :fields="fields"></b-table>
  		</div>
  	</div>
</template>

<script>
import axios from 'axios'
export default {
    data () {
    	return {
    		requests: [],
    		request: {
    			id: '',
    			client_name: '',
    			client_phone: '',
    			tariff: '',
    			delivery_date: '',
    			price: '',
    			address: ''
    		},
		    fields: [
		        {
		            key: 'id',
		            sortable: true
		        },
        		{
          			key: 'client_name',
          			label: 'Имя',
          			sortable: false
        		},
        		{
          			key: 'client_phone',
          			label: 'Телефон',
          			sortable: false,
        		},
        		{
        			key: 'tariff',
        			label: 'Тариф',
        			sortable: false,
        		}, 
        		{
        			key: 'delivery_date',
        			label: 'Дата доставки',
        			sortable: true,
        		},
        		{
        			key: 'price',
        			label: 'Цена',
        			sortable: false,
        		},
        		{
        			key: 'address',
        			label: 'Адрес',
        			sortable: false,
        		}
      		],
    	}
  	},
  	mounted() {
        axios.get('get-requests').then((response) => {
            this.requests = response.data;
        }).catch(function (error) {
            console.log(error);
        });
	}
}
</script>

<style>
	.requests-table {
		margin-top: 50px;
		margin-bottom: 100px;
	}
</style>