<template>
	
<div class="container">
	


<form v-on:submit.prevent="AddFood">
  <div class="form-group">
    <label for="name">Name of food</label>
    <input type="text" class="form-control" placeholder="Enter food name" v-model="food.name">
    <div class="" v-text="validator.getMessage('name')" style="color:red"></div>
    </div>


    <div class="form-group">
    <label for="name">Choose food category</label>
    <multiselect v-model="food.category" :options="categories"></multiselect>
    <div class="" v-text="validator.getMessage('category')" style="color:red"></div>
    </div>
	

    <div class="form-group">
    <label for="name">Price of food</label>
    <input type="number" class="form-control" placeholder="Price of the food" v-model="food.price">
    <div class="" v-text="validator.getMessage('price')" style="color:red"></div>
    </div>

    <div class="form-group">
    <label for="name">Food Description</label>
    <textarea class="form-control" placeholder="Description of the food" v-model="food.description"></textarea>
    <div class="" v-text="validator.getMessage('description')" style="color:red"></div>
    </div>

    <div class="form-group">
    <button class="btn btn-info">Submit</button>
    </div>

</form>
</div>



</div>

</template>


<script type="text/javascript">
	
import Multiselect from 'vue-multiselect';
import Validator from '../utilities/validator.js';
export default{

	props:['categories','restoId'],
	components:{Multiselect},
	data(){


		return{

			food:this.emptyFoodItem(),
			validator:new Validator()

		}
	},



	methods:{

		emptyFoodItem(){

			return {

				name:'',
				category:'',
				price:0,
				description:''

			}

		},
		AddFood(){
			
			let postFood=this.food;
			postFood.restoId=this.restoId;

			this.$Progress.start();
			axios.post('/api/food/save', this.food)
			
				.then((response)=>{


					
					this.$emit('newMenuAdded',response.data,postFood.category)
					Toast.fire({
                            type: 'success',
                            title: 'Food item added!'
                                })
					this.$Progress.finish();
					this.food=this.emptyFoodItem();
				})
				
				.catch((error)=>{
					
					if (error.response.status==422) {


						this.validator.setMessages(error.response.data.errors);
					}
					Toast.fire({
                            type: 'error',
                            title: 'Food not added.check errors'
                                })
					this.$Progress.fail();

				});

		}
	}

}


</script>