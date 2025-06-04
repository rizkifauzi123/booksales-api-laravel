<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user', 'book')->get();

        if ($transactions->isEmpty()) {
            return response()->json([
                "success" => false,
                "message" => "No transactions found",
            ],200);
        }

        return response()->json([
            "success" => true,
            "data" => $transactions,
        ]);
    }


    public function store(Request $request)
    {
    // 1. validator & cek validator
    $validator = Validator::make($request->all(), [
        'book_id' => 'required|exists:books,id',
        'quantity'=> 'required|integer|min:1',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => 'Validation failed',
            'data' => $validator->errors(),
        ], 422);
    }

    // 2. generate order number -> unique | ORD-003
    $uniqueCode = 'ORD-' . strtoupper(uniqid());

    // 3. ambil user yang sedang login & cek login (apakah ada data user)
    $user = auth('api')->user();

    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'Unauthorized!',
        ], 401);
    }

    // 4. mencari data buku dari request
    $book = Book::find($request->book_id);

    // 5. cek apakah buku tersedia
    if ($book->stock < $request->quantity) {
        return response()->json([
            'success' => false,
            'message' => 'Book not available or insufficient stock',
        ], 404);
    }

    // 6. hitung total harga = price * quantity
    $totalAmount = $book->price * $request->quantity;

    // 7. kurangi stock buku (update)
    $book->stock -= $request->quantity;
    $book->save();

    // 8. simpan data transaksi
    $transaction = Transaction::create([
        'order_number' => $uniqueCode,
        'customer_id' => $user->id,
        'book_id' => $request->book_id,
        'total_amount' => $totalAmount,
    ]);
    return response()->json([
        'success' => true,
        'message' => 'Transaction created successfully',
        'data' => $transaction,
    ], 201);
}
}