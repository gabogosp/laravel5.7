<div class="card-body align-self-center border">
	
	<h3 class="py-3">Existen  {{$inactive_count_publicities}} <span class="bg-danger text-white px-2 rounded">Publicaciones Inactivas</span></h3>
	<div class="w-100"><input type="text" id="myInputInactiveRotadorPrincipal" onkeyup="myFunctionInactiveRotadorPrincipal()" placeholder="Buscar por número de referencia..." title="Número de referencia"></div>
	<table class="table table-hover table-responsive" id="myTableInactiveRotadorPrincipal">
		<thead>
			<tr>
				<th scope="col">Referencia</th>
				<th scope="col">Estado</th>
				<th scope="col">Tipo</th>
				<th scope="col">Ciudad</th>
				<th scope="col">fecha de publicación</th>
				<th scope="col">&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			@foreach($inactive_publicities as $slider)
				<tr>
					<td scope="row"><strong>{{$slider->id}}</strong></td>

					<td scope="row">
						@if($slider->status) 
							<a href="" title="Hacer click para desactivar publicación" style="text-decoration: none;" class="text-success">
								<i class="fas fa-check"></i>
							</a> 
						@else 
							<a href="{{ url('profile/administracion/activar-publicacion/') }}/{{$slider->id}}" title="Hacer click para activar publicación" style="text-decoration: none;" class="text-danger">
								<i class="fas fa-times" ></i>
							</a> 
						@endif
					</td>
					<td scope="row">
						@foreach($category as $cat)
							<small>
								@if($slider->category_id == $cat->id)
									{{$cat->name}}
								@endif
							</small>
						@endforeach
					</td>
					<td scope="row">
						@foreach($city as $ciudad)
							<small>
								@if($slider->city_id == $ciudad->id)
									{{$ciudad->name}}
								@endif
							</small>
						@endforeach
					</td>
					<td scope="row">{{$slider->creation_date}}</td>
					<td scope="row">
						<a href="{{ url('profile/administracion/editar-rotador-principal/') }}/{{$slider->id}}" title="Editar anuncio"><i class="fas fa-edit"></i></a>
						<a href="#" title="Eliminar anuncio"><i class="fas fa-trash-alt ml-3"></i></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="row px-1">
    			<div class="col-md-6 offset-md-3">
			<div >{{ $inactive_slideshow->links() }}</div>
		</div>
	</div>
</div>

<script>
function myFunctionInactiveRotadorPrincipal() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInputInactiveRotadorPrincipal");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTableInactiveRotadorPrincipal");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<style>
	#myInputInactiveRotadorPrincipal {
	  background-position: 10px 10px;
	  background-repeat: no-repeat;
	  width: 100%;
	  font-size: 16px;
	  padding: 12px 20px 12px 40px;
	  border: 1px solid #ddd;
	  margin-bottom: 12px;
	}	
</style>