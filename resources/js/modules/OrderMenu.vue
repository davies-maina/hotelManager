<template>


	<div class="container">
		

		<menu-search :items="items"></menu-search>
<menu-items :items="items"></menu-items>
	</div>

</template>


<script type="text/javascript">
	

export default{

	props:['items']

}



</script>

