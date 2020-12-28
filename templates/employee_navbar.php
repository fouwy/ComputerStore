<nav class="navbar">
<ul>
	<li><a <?php if($_SERVER['SCRIPT_NAME']=='/ComputerStore/sibd/employee.php') {
		?> id="active" <?php } ?> href="employee.php">Home</a></li>

	<li><a <?php if($_SERVER['SCRIPT_NAME']=='/ComputerStore/sibd/addService.php') {
		?> id="active" <?php } ?> href="addService.php">Add a Service</a></li>

	<li><a <?php if($_SERVER['SCRIPT_NAME']=='/ComputerStore/sibd/editService.php') {
		?> id="active" <?php } ?> href="editService.php">Edit a Service</a></li>

	<li><a <?php if($_SERVER['SCRIPT_NAME']=='/ComputerStore/sibd/addComputer.php') {
		?> id="active" <?php } ?> href="addComputer.php">Add a Computer</a></li>

	<li><a <?php if($_SERVER['SCRIPT_NAME']=='/ComputerStore/sibd/search_employee.php') {
		?> id="active" <?php } ?> href="search_employee.php">Search Employees & Clients</a></li>
</ul>
</nav>