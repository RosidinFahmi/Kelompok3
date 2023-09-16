<?php
// Data transaksi terakhir (contoh)
$transactions = [
        1 => ['amount' => -500, 'description' => 'Pengeluaran', 'date' => '2023-09-12'],
        2 => ['amount' => 1000, 'description' => 'Pemasukan', 'date' => '2023-09-11'],
    // Tambahkan data transaksi lainnya sesuai kebutuhan
];


// Mendapatkan daftar transaksi terakhir untuk akun tertentu
function getTransactions($accountId) {
        global $transactions;
        $accountTransactions = [];
        foreach ($transactions as $id => $transaction) {
        if ($accountId == $id) {
                $accountTransactions[] = $transaction;
        }
        }
        return $accountTransactions;
}

// Memeriksa metode HTTP
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Memeriksa apakah parameter 'account_id' ada dalam URL
        if (isset($_GET['account_id'])) {
                $accountId = $_GET['account_id'];
                $accountTransactions = getTransactions($accountId);

        if (!empty($accountTransactions)) {
                echo json_encode(['transactions' => $accountTransactions]);
        } else {
                http_response_code(404);
                echo json_encode(['error' => 'Akun tidak memiliki transaksi']);
        }
        } else {
                http_response_code(400);
                echo json_encode(['error' => 'ID akun harus disertakan']);
        }
} else {
        http_response_code(405);
        echo json_encode(['error' => 'Metode HTTP tidak diizinkan']);
}

?>
