<template>
	

<div class="container">
	
<div class="row mb-3">
	
	<div class="col-md-12 mb-3">
		<button class="btn btn-success float-right" @click="handleSaveOrder">Save</button>
	</div>
	<div class="col-md-7">
		
		<div class="mb-5">
			<h3>Customer Details</h3>
			<order-form @customerDetailsChanged="customerDetailsChangedHandler"></order-form>
		</div>

<div class="mb-5">
	
	<h3>Order Details <span class="float-right" v-if="finalAmount>0">Total: Ksh {{ finalAmount }}</span>


		<p v-else="">No items yet</p>
	</h3>
<order-details :order-details="orderDetails"></order-details>

</div>


	</div>
	<div class="col-md-5">
		

		<order-menu :items="menu" @menuItemAdd="handleNewMenuItem"></order-menu>

	</div>

</div>

</div>


</template>

<script type="text/javascript">
	

export default{

	props:['hotelId'],
	data(){
		return{


			menu:[],
			orderDetails:[],
			originalMenuItems:[],
			customerDetails:null
		}

	},
	mounted(){


		this.getMenuItems();
		window.eventBus.$on('menuItemAdd',this.handleNewMenuItem);
		window.eventBus.$on('searchList', this.handleSearchList);
		window.eventBus.$on('clearSearchList', this.handleClearSearchList);


	},


	methods:{

		getMenuItems(){


			let postData={hotelId: this.hotelId}

			axios.post('/api/hotel/menu',postData)
				.then((response)=>{


					this.menu=response.data
					this.originalMenuItems=response.data

				})

				.catch(()=>{





				})

		},

		handleNewMenuItem(item){

			this.orderDetails.unshift(item);

		},

		handleSearchList(searchList){

			this.menu=searchList;
		},
		handleClearSearchList(){


			this.menu=this.originalMenuItems
		},
		customerDetailsChangedHandler(customer){

			this.customerDetails=customer;

		},


		handleSaveOrder(){

			let orderedItemsIds=[];
			this.orderDetails.forEach(order=>{

				orderedItemsIds.push(order.id)


			})
			let orderData={
				resto_id:this.hotelId,
				order_data:{

				customerDetails:this.customerDetails,
				finalAmount:this.finalAmount,
				orderItems:orderedItemsIds
				}

			}

			console.log(orderData);
			this.$Progress.start();
			axios.post('/api/order/save', orderData)
				.then((response)=>{
					Toast.fire({
                            type: 'success',
                            title: 'Order Sent!'
                                })
					this.$Progress.finish();
					console.log(response);


				})
				.catch(()=>{


					Toast.fire({
                            type: 'error',
                            title: 'Order not sent'
                                })
					this.$Progress.fail();


				})
		}

	},

	computed:{


		finalAmount(){

			let price=0;
			this.orderDetails.forEach(order=>{

				price=price+order.price;


			});

			return price;
		}
	}


}


</script>
