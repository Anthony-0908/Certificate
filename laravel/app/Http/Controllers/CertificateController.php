<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;
use App\Models\certificates;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function generatePDF()
{
    // Create a new Dompdf instance
    $pdf = new Dompdf();

    // Load a view file (Blade or any other view format)
    $pdf->loadHtml('<h1>Hello, World!</h1>
    <h2>Hello world! </h2>');

    // (Optional) Set paper size and orientation
    // $pdf->setPaper('A4', 'portrait');

    // (Optional) Set additional options
    // $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);

    // Render the PDF
    $pdf->render();

    // Return the PDF as a response
    return $pdf->stream('document.pdf');
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificates = certificates::with(['user', 'lesson']);
        return view('certificates.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'lesson_id' => 'required|exists:lessons,id',
        ]);

        // Save the user_id and lesson_id in the certificates table
        certificates::create([
            'user_id' => $validatedData['user_id'],
            'lesson_id' => $validatedData['lesson_id'],
        ]);


        return redirect()->back()->with('success', 'Certificate created successfully.');


    }

    public function certificates()
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
