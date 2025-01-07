<?php
require 'session.php'; // 假設這是您的程式碼檔案
require 'template.php'; // 假設這是您的程式碼檔案
date_default_timezone_set('Asia/Taipei');  // Or 'Asia/Kuala_Lumpur' for Malaysia, 'Asia/Taipei' for Taiwan, etc.
myhead01();
myhead02();
mynavbar();
$account=$_SESSION['username'];
$record="";
$j=0;
for($i=1;$i<100;$i++){
	$cmd = 'curl -X GET "'.$dify_ip.'/v1/workflows/logs?limit=100&page='.$i.'" --header "Authorization: Bearer '.$law_key.'"';
	// Execute the command
	$fullResponse = shell_exec($cmd);
	// 確保 $fullResponse 不為空
	if ($fullResponse) {
		// 將完整響應轉換為 JSON
		$responseData = json_decode($fullResponse, true);
		$data=$responseData["data"];
		if (count($data)==0) break;
		foreach ($data as $key => $arr){
			$session_id=($arr["created_by_end_user"]["session_id"]);
			if ($account==$session_id){
				$session_id=($arr["created_by_end_user"]["session_id"]);
				$id=($arr["workflow_run"]["id"]);
				$created_at=($arr["workflow_run"]["created_at"]);
				if ($arr["workflow_run"]["status"]=="succeeded"){
				$status="<p class=\"text-success\">SUCCESS</p>";
				//$url="<a href=\"news_writting_logs_detail.php?id={$id}\" target=\"_blank\">OPEN</a>";
				$url="<a href=\"law_logs_detail.php?id={$id}\">OPEN</a>";				
				}else{
				$status="False";
				$url=$status;
				}
				//echo $session_id." ".$id." ".$created_at." ".$status."<br>";
				$datetime = date('Y-m-d H:i:s', $created_at);
				$cmd = 'curl -X GET "'.$dify_ip.'/v1/workflows/run/'.$id.'" --header "Authorization: Bearer '.$law_key.'" -H "Content-Type: application/json"';
				$fullResponse = trim(shell_exec($cmd));
				if (($fullResponse) && ($fullResponse!='{"message": "Internal Server Error", "code": "unknown"}')){
					$responseData = json_decode($fullResponse, true);
					$inputs=$responseData["inputs"]; $input = json_decode($inputs, true); $title=mb_substr($input["title"],0,40,"UTF-8")." ...";
				}else{
					$title="<p class=\"text-danger\">ERROR</p>";
				}				
				$j++;
				$record.="            { id: {$j}, title: '{$title}', name: '{$datetime}', age: '{$status}', city: '{$url}' },
";
			}
		}
	}
}	
$record=substr(trim($record),0,-1);		
?>

<main class="form-signin w-75 m-auto">
    <div class="container mt-5">
		<h5 class="mb-4"><b>民眾陳情回文: </b></h5>


        <!-- Table -->
        <table class="table table-striped table-bordered small">
            <thead>
                <tr>
                    <th>#</th>
                    <th>主題</th>					
                    <th>時間</th>
                    <th>狀態</th>
                    <th>結果</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <!-- Table rows will be dynamically inserted here -->
            </tbody>
        </table>

        <!-- Pagination -->
        <nav aria-label="Table pagination">
            <ul class="pagination justify-content-center" id="pagination">
                <!-- Pagination buttons will be dynamically inserted here -->
            </ul>
        </nav>
    </div>
</main>
  

<?
mycontact();
myjs();
?>
  <script>
        // Sample data for the table
        const data = [
			<?=$record;?>
        ];

        const rowsPerPage = 5;
        let currentPage = 1;

        // Function to display table rows for the current page
        function displayTableRows() {
            const start = (currentPage - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            const rows = data.slice(start, end);

            const tableBody = document.getElementById("table-body");
            tableBody.innerHTML = ""; // Clear existing rows

            rows.forEach(row => {
                const tr = document.createElement("tr");
                tr.innerHTML = `
                    <td><small class="text-muted">${row.id}</small></td>
                    <td><small class="text-muted">${row.title}</small></td>
                    <td><small class="text-muted">${row.name}</small></td>
                    <td><small class="text-muted">${row.age}</small></td>
                    <td><small class="text-muted">${row.city}</small></td>
                `;
                tableBody.appendChild(tr);
            });
        }

        // Function to create pagination buttons
        function createPagination() {
            const totalPages = Math.ceil(data.length / rowsPerPage);
            const pagination = document.getElementById("pagination");
            pagination.innerHTML = ""; // Clear existing buttons

            for (let i = 1; i <= totalPages; i++) {
                const li = document.createElement("li");
                li.className = `page-item ${i === currentPage ? "active" : ""}`;
                li.innerHTML = `<button class="page-link">${i}</button>`;
                li.addEventListener("click", () => {
                    currentPage = i;
                    displayTableRows();
                    createPagination();
                });
                pagination.appendChild(li);
            }
        }

        // Initialize the table and pagination
        displayTableRows();
        createPagination();
    </script>
<?php
myfooter();
