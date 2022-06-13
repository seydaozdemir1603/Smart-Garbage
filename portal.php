<?php
include './session_controller.php';
include './header.php';
$value = 40;
$status = "on";
?>
<?php
$url = "https://smartgarbage1108.com/api/status.php";

$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);

$result = json_decode($response);

if ($result[0]->status) {
    $status = "on";
} else {
    $status = "off";
}
?>
<div class="container">
    <div class="vh-100 row align-items-center">
        <div class="col-12 col-md-4 mx-auto">

            <div class="card-shadow my-5">
                <div class="row">
                    <div class="col-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-100" fill="transparent" viewBox="0 0 24 24" stroke="#FFA630">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <div class="col-8 text-end d-grid align-items-center">
                        <h3>Fullnes Ratio</h3>
                        <h1>% <?php echo $result[0]->value; ?></h1>
                    </div>
                </div>

            </div>

            <div class="card-shadow my-5">
                <div class="row">
                    <div class="col-4">
                        <svg id="online" xmlns="http://www.w3.org/2000/svg" class="w-100 <?php if (!$result[0]->status) {
                                                                                                echo "d-none";
                                                                                            }; ?>" fill="none" viewBox="0 0 24 24" stroke="#198754">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5.636 18.364a9 9 0 010-12.728m12.728 0a9 9 0 010 12.728m-9.9-2.829a5 5 0 010-7.07m7.072 0a5 5 0 010 7.07M13 12a1 1 0 11-2 0 1 1 0 012 0z" />
                        </svg>
                        <svg id="offline" xmlns="http://www.w3.org/2000/svg" class="w-100 <?php if ($result[0]->status) {
                                                                                                echo "d-none";
                                                                                            }; ?>" fill="none" viewBox="0 0 24 24" stroke="#dc3545">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M18.364 5.636a9 9 0 010 12.728m0 0l-2.829-2.829m2.829 2.829L21 21M15.536 8.464a5 5 0 010 7.072m0 0l-2.829-2.829m-4.243 2.829a4.978 4.978 0 01-1.414-2.83m-1.414 5.658a9 9 0 01-2.167-9.238m7.824 2.167a1 1 0 111.414 1.414m-1.414-1.414L3 3m8.293 8.293l1.414 1.414" />
                        </svg>
                    </div>
                    <div class="col-8 text-end d-grid align-items-center">
                        <h1 id="status" class="text-capitalize"><?php echo $status; ?></h1>
                    </div>
                </div>

            </div>


        </div>
        <div class="col-6 d-md-block d-none">
            <img src="./assets/img/trashcan.svg" class="img-fluid">
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>