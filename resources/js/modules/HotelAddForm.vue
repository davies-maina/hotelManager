<template>
	


<div class="container">
	<h3 class="mb-3">Add Hotel</h3>
	
		
			
			<div class="form-group">
				
				<label for="name">Name</label>

				<input type="text" name="name" class="form-control" placeholder="Hotel name" v-model="hotel.name">

			</div>

<div class="form-group">
	

<label for="name">Location</label>
<input type="text" name="location" placeholder="Hotel Location" class="form-control" v-model="hotel.location">

</div>


<div class="form-group">
	
<label for="name">Number of Tables</label>
<input type="text" name="tables" placeholder="Number of Hotel tables" class="form-control" v-model="hotel.tables">

</div>
<button class="btn btn-info" @click="addButton">Add &amp; Save</button>
<button class="btn btn-primary" @click="cancelAddNewHotel">Cancel</button>

		


</div>



</template>


<script type="text/javascript">
	



export default{
	created(){

		axios.get('/api/user')
			.then((response)=>{

				console.log(response.data);

			})
	},
	data(){


		return{


			hotel:this.thisHotel()


		}



	},


	


	methods:{

		thisHotel(){



			return {

				name:'',
				location:'',
				tables:0



			}


		},

		cancelAddNewHotel(){

			this.$modal.hide('addNewHotel')



		},


		addButton(){


			this.$emit('addButtonEvent', this.hotel);

		}


	}


}




</script>