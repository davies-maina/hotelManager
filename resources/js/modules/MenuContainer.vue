<template>
	
	<div class="container">

		<div class="row">
			

			<div class="col-md-8">
				

				<card-main>
					
					<template slot="title"><h4>My menu</h4></template>
					<template slot="body">
						

						<div class="section">
							<p class="lead">Select food category</p>
							<multiselect :options="categories" v-model="menu"></multiselect>


						</div>

						<menu-group :items="currentItems"></menu-group>
					</template>



				</card-main>

			</div>

			<div class="col-md-4">
				

				<card-main>
					
					<template slot="title"><h4>Add food</h4></template>
					<template slot="body">
						


						<menu-add 


						:categories="categories" 

						:resto-id="restoId"

						v-on:newMenuAdded="getNewMenuItem"

						></menu-add>


					</template>



				</card-main>




			</div>

		</div>

	</div>
</template>


<script>
	
import Multiselect from 'vue-multiselect';
import _ from 'lodash';
import Menugroup from './MenuGroups.vue';
import Menuadd from './MenuAddForm.vue';


export default{


	props:['items','restoId'],
	components:{

		Multiselect,Menugroup,Menuadd
	},

	mounted(){


		_.forEach(this.items,(item,key)=>{


			this.categories.push(key)
		})

		this.menu=this.categories[0];
		this.localItems=this.items;
	},

	data(){

		return{
			localItems:'',
			categories:[],

			menu:''

		}

	},

	computed:{


		currentItems(){

			return this.localItems[this.menu]


		}

	},

	methods:{

		getNewMenuItem(item,category){
			console.log('item',item);
			this.localItems[category].unshift(item);


		}


	}
}



</script>