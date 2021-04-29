<!-- Main -->

<section class="wrapper style1">
    <div class="container">
        <h2>Agenda de Consultas</h2>
        <div class="row gtr-200">
            <table id="table_id" class="display">
                <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Domingo</th>
                    <th>Segunda</th>
                    <th>Terça</th>
                    <th>Quarta</th>
                    <th>Quinta</th>
                    <th>Sexta</th>
                    <th>Sábado</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td><a href='#'>Reservado</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><a href='#'>Reservado</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><a href='#'>Reservado</a></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><a href='#'>Reservado</a></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td><a href='#'>Reservado</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<form method="POST" action="controllers/.php">

		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputPassword4">Data</label>
				<input type="date" class="form-control" id="schedule_date" placeholer="Data">
			</div>

			<div class="form-group col-md-6">

				<label for="available_time_desc">Horários Disponíveis</label>
					<select id="available_time_desc" class="form-control">
						<option selected>Escolha o horário disponível</option>
						<option>...</option>
					</select>
			</div>

			<div class="form-group col-md-6">
				<label for="user_name">Primeiro Nome</label>
				<input type="text" class="form-control" id="user_name" value="Gabriel" placeholder="Primeiro Nome">
			</div>	

			<div class="form-group col-md-6">
				<label for="user_lastname">Últimos Nomes</label>
				<input type="text" class="form-control" id="user_lastname" value="Guedes Flores" placeholder="Últimos Nomes">	
			</div>	

			 <div class="form-group col-md-6">
				<label for="schedule_type_desc">Tipo de Consulta</label>
					<select id="schedule_type_desc" class="form-control">
						<option selected>Escolha o tipo de consulta</option>
						<option>...</option>
					</select>
			</div>		
		</div>
		
		
		
    </form>
