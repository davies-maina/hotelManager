<template>
	
	<ul class="list-group">


	<li class="list-group-item" v-for="(item,key) in items" :key="key">
		<div class="row">
			<div class="col-md-10">
				

				{{ item.name }} <span class="float-right">{{ item.price }}</span>
				<br>
				<small>{{ item.category.name }}</small>
				
			</div>


			<div class="col-md-2">
				
				<button class="btn btn-primary btn-sm" @click="handleMenu(item)">Add</button>
			</div>
		</div>

		
		

		


	</li>
	
</ul>
</template>

<script type="text/javascript">
	

export default{

	props:['items'],

	methods:{


		handleMenu(item){

			window.eventBus.$emit('menuItemAdd',item);

		}
	}



}



</script>