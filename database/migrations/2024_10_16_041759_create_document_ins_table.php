<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('document_ins', function (Blueprint $table) {
            $table->id();
            $table->datetime('received_at'); # Tanggal diterima
            $table->string('document_no'); # Nomor Surat
            $table->string('from'); # Dari
            $table->string('to'); # Kepada
            $table->string('subject'); # Perihal
            $table->unsignedBigInteger('document_type_id'); # Jenis Surat
            $table->text('file'); # File
            $table->string('status'); # Status Surat (Diterima, Diteruskan, Selesai)
            $table->string('document_index')->nullable(); # Indeks Surat
            $table->datetime('finished_at')->nullable(); # Tanggal Selesai
            $table->string('instruction_note')->nullable(); # Catatan
            $table->string('forwarded_to')->nullable(); # Diteruskan ke
            $table->enum('department', ['Sekretariat', 'Bidang Pemuda', 'Bidang Olahraga']); # Departemen
            $table->unsignedBigInteger('created_by_user_id'); # Dibuat oleh
            $table->timestamps();

            $table->foreign('document_type_id')->references('id')->on('document_types');
            $table->foreign('created_by_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_ins');
    }
};
