<template>
	
<ul class="list-group list-group-flush">
	<li class="list-group-item list-group-item-action flex-column align-items-start active" v-for="(orderDetail,key) in orderDetails" :key="key">
		

		{{ orderDetail.name }} , <small style="color:gold">{{ orderDetail.category.name }}</small> <span class="float-right">{{ orderDetail.price }}</span>
	</li>



</ul>


</template>

<script type="text/javascript">
	

export default{




	props:['orderDetails']
}



</script>