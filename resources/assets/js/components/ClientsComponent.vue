<template>
	<div class = "container request-container d-flex justify-content-center">
        <div class = "col-12">
  			<b-table class = "clients-table" responsive striped hover :items="clients" :fields="fields"></b-table>
  		</div>
  	</div>
</template>

<script>
import axios from 'axios'
export default {
    data () {
    	return {
    		clients: [],
    		client: {
    			id: '',
    			name: '',
    			phone: '',
    			requests: ''
    		},
		    fields: [
		        {
		            key: 'id',
		            sortable: true
		        },
        		{
          			key: 'name',
          			label: 'Имя',
          			sortable: false
        		},
        		{
          			key: 'phone',
          			label: 'Телефон',
          			sortable: false,
        		},
        		{
        			key: 'requests',
        			label: 'Количество заказов',
        			sortable: true,
        		}
      		],
    	}
  	},
  	mounted() {
        axios.get('get-clients').then((response) => {
            this.clients = response.data;
        }).catch(function (error) {
            console.log(error);
        });
	}
}
</script>

<style>
	.clients-table {
		margin-top: 50px;
		margin-bottom: 100px;
	}
</style>