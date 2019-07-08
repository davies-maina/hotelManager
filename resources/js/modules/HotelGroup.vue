<template>
	

<div class="container-fluid">
<div class="row">
	<div class="col-md-4 mb-4" v-for="hotel in currentHotel" :key="hotel.id">
		
		<card-main>
			

			<template slot="title">{{ hotel.name }}</template>
			<template slot="body">


				{{ hotel.location }}
				<br>
				<a :href="hotel.slug"><span class="badge badge-info"> View Menu</span></a>
				<a :href="hotel.ordersSlug"><span class="badge badge-info"> Orders</span></a>
				<a :href="hotel.slug"><span class="badge badge-info">Set features</span></a>

			</template>

		</card-main>


	</div>
	<div class="col-md-4" v-if="hotelNumber">
		

		<card-main>
			

			<template slot="title">Add a new Hotel</template>
			<template slot="body"><span @click="handleAddNewHotel">+</span> </template>

		</card-main>

		<modal name="addNewHotel" :adaptive="true" height="60%" @closeModal="cancelAddNewHotel">
			

			<hotel-form @addButtonEvent="saveHotel"></hotel-form>


		</modal>

	</div>

</div>

</div>
</template>


<script type="text/javascript">
	



export default{



props:['hotels'],

created(){

this.currentHotel=this.hotels;

},
data(){


return {


	currentHotel:[]

}

},

computed:{


	hotelNumber(){

		return (this.currentHotel.length<5) ? true : false;


	}
},

methods:{

handleAddNewHotel(){



	this.$modal.show('addNewHotel');
},


cancelAddNewHotel(){


this.$modal.hide('addNewHotel');
this.$emit('closeModal')

}
,

saveHotel(hotelData){

console.log('hotelData', hotelData);
axios.post('/api/hotel',hotelData)
	.then((response)=>{

		this.$Progress.start();
		this.currentHotel.unshift(response.data);
		Toast.fire({
                            type: 'success',
                            title: 'New Hotel Added'
                                })
		this.$modal.hide('addNewHotel');

		this.$Progress.finish();

	})

	.catch(()=>{


		this.$Progress.fail();
		Toast.fire({
                            type: 'error',
                            title: 'Hotel not added'
                                })


	})


}

}


}




</script>