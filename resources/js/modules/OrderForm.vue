<template>
	
	<div class="container">
		
		<form>
			
<div class="form-group">
	
	<label for="name">Name</label>
	<input type="text" name="" class="form-control" v-model="customer.name">
</div>

<div class="form-group">
	
	<label for="name">Phone</label>
	<input type="text" name="" class="form-control" v-model="customer.phone">
</div>
<div class="form-group">
	
	<label for="name">Address</label>
	<input type="text" name="" class="form-control" v-model="customer.address">
</div>

		</form>



	</div>


</template>


<script type="text/javascript">
	

export default{

data(){

	return{

		customer:{

			'name':'',
			'phone':'',
			'address':''


				}

			}



		},


		watch:{


			customer:{


				handler(value){

				
				let customer={

					name:value.name,
					phone:value.phone,
					address:value.address

				}

				this.$emit('customerDetailsChanged', customer);
			},deep:true
			}
		}


}





</script>