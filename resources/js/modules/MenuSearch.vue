<template>
	


<div class="input-group mb-3">
			

			<input type="text" name="" placeholder="search in menu" v-model="searchString" class="form-control">
			
		</div>
</template>


<script type="text/javascript">
	

	export default{


		props:['items'],

		data(){

			return{

				searchString:''
			}

		},

		computed:{

			searchList(){

				return this.items.filter(item=>{


					return item.name.toLowerCase().includes(this.searchString.toLowerCase());
				})

			}

		},


		watch:{


			searchString(value){

				if (value !='') {

					window.eventBus.$emit('searchList', this.searchList)
				}

				else{

					window.eventBus.$emit('clearSearchList')
				}
			}
		}
	}
</script>