<template>
	

<div class="section">
							
						<div class="table-responsive-sm mt-3">
							

								<table class="table table-hover table-bordered table-striped">
  <thead>
    <tr class="text-center">
      
      <th scope="col">NAME</th>
      <th scope="col">DESCRIPTION</th>
      <th scope="col">PRICE</th>
      
    </tr>
  </thead>
  <tbody>
    <tr v-for="(item,key) in items" :key="key">
      
      <td><strong v-text="item.name"></strong></td>
      <p v-text="item.description"></p>
      <td><span><strong v-text="item.price"></strong></span></td>
      
    </tr>
    
  </tbody>
</table>
						</div>

						</div>


</template>

<script type="text/javascript">
	



export default{


props:['items'],



}







</script>