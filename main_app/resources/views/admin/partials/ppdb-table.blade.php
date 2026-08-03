<div class="admin-table-container">
    <table class="admin-table">
        <thead>
            <tr>
                <th>
                    <a href="#" class="sort-header" data-sort="nisn" style="color: inherit; text-decoration: none; display: flex; align-items: center; gap: 0.25rem;">
                        NISN
                        @if($sortBy === 'nisn')
                            <i class="fa-solid fa-sort-{{ $sortOrder === 'asc' ? 'up' : 'down' }} text-gold"></i>
                        @else
                            <i class="fa-solid fa-sort text-muted" style="opacity: 0.4;"></i>
                        @endif
                    </a>
                </th>
                <th style="text-align: center; width: 100px;">No. Antrean</th>
                <th>
                    <a href="#" class="sort-header" data-sort="name" style="color: inherit; text-decoration: none; display: flex; align-items: center; gap: 0.25rem;">
                        Nama Lengkap
                        @if($sortBy === 'name')
                            <i class="fa-solid fa-sort-{{ $sortOrder === 'asc' ? 'up' : 'down' }} text-gold"></i>
                        @else
                            <i class="fa-solid fa-sort text-muted" style="opacity: 0.4;"></i>
                        @endif
                    </a>
                </th>
                <th>Rekomendasi</th>
                <th style="text-align: center;">KK</th>
                <th style="text-align: center;">Akta</th>
                <th style="text-align: center;">SKL</th>
                <th style="text-align: center;">SPMB</th>
                <th style="text-align: center;">Surat</th>
                <th>
                    <a href="#" class="sort-header" data-sort="uploaded_at" style="color: inherit; text-decoration: none; display: flex; align-items: center; gap: 0.25rem;">
                        Status
                        @if($sortBy === 'uploaded_at')
                            <i class="fa-solid fa-sort-{{ $sortOrder === 'asc' ? 'up' : 'down' }} text-gold"></i>
                        @else
                            <i class="fa-solid fa-sort text-muted" style="opacity: 0.4;"></i>
                        @endif
                    </a>
                </th>
                <th style="width: 80px; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr>
                    <td data-label="NISN"><strong>{{ $student->nisn }}</strong></td>
                    <td data-label="No. Antrean" style="text-align: center;">
                        @if($student->queue_number)
                            <span class="badge" style="background-color: #d4af37; color: #fff; font-weight: 700; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.8rem;">#{{ $student->queue_number }}</span>
                        @else
                            <span style="color: var(--text-muted); font-style: italic; font-size: 0.85rem;">-</span>
                        @endif
                    </td>
                    <td data-label="Nama Lengkap">
                        <a href="#" class="view-biodata" data-student="{{ json_encode($student) }}" style="color: var(--primary-dark); text-decoration: none; font-weight: 700;" title="Klik untuk lihat detail biodata">{{ $student->name }}</a>
                        <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $student->birth_place ?: '-' }}, {{ $student->birth_date ? $student->birth_date->format('d M Y') : '-' }}</div>
                    </td>
                    <td data-label="Rekomendasi">{{ $student->class_recommendation ?: 'Umum / Lulus' }}</td>
                    
                    <!-- KK Icon Status -->
                    <td data-label="KK" style="text-align: center;">
                        @if($student->kk_path)
                            <a href="{{ asset($student->kk_path) }}" class="text-gold view-document" data-title="Kartu Keluarga (KK) – {{ $student->name }}" title="Lihat Kartu Keluarga"><i class="fa-solid fa-circle-check" style="color: #10b981; font-size: 1.1rem;"></i></a>
                        @else
                            <i class="fa-solid fa-circle-xmark" style="color: #cbd5e1; font-size: 1.1rem;"></i>
                        @endif
                    </td>

                    <!-- Akta Icon Status -->
                    <td data-label="Akta" style="text-align: center;">
                        @if($student->akta_path)
                            <a href="{{ asset($student->akta_path) }}" class="text-gold view-document" data-title="Akta Kelahiran – {{ $student->name }}" title="Lihat Akta Kelahiran"><i class="fa-solid fa-circle-check" style="color: #10b981; font-size: 1.1rem;"></i></a>
                        @else
                            <i class="fa-solid fa-circle-xmark" style="color: #cbd5e1; font-size: 1.1rem;"></i>
                        @endif
                    </td>

                    <!-- SKL Icon Status -->
                    <td data-label="SKL" style="text-align: center;">
                        @if($student->photo_path)
                            <a href="{{ asset($student->photo_path) }}" class="text-gold view-document" data-title="SKL – {{ $student->name }}" title="Lihat SKL"><i class="fa-solid fa-circle-check" style="color: #10b981; font-size: 1.1rem;"></i></a>
                        @else
                            <i class="fa-solid fa-circle-xmark" style="color: #cbd5e1; font-size: 1.1rem;"></i>
                        @endif
                    </td>

                    <!-- SPMB Icon Status -->
                    <td data-label="SPMB" style="text-align: center;">
                        @if($student->spmb_path)
                            <a href="{{ asset($student->spmb_path) }}" class="text-gold view-document" data-title="Bukti SPMB – {{ $student->name }}" title="Lihat Bukti SPMB"><i class="fa-solid fa-circle-check" style="color: #10b981; font-size: 1.1rem;"></i></a>
                        @else
                            <i class="fa-solid fa-circle-xmark" style="color: #cbd5e1; font-size: 1.1rem;"></i>
                        @endif
                    </td>

                    <!-- Statement Icon Status -->
                    <td data-label="Surat" style="text-align: center;">
                        @if($student->statement_path)
                            <a href="{{ asset($student->statement_path) }}" class="text-gold view-document" data-title="Surat Pernyataan – {{ $student->name }}" title="Lihat Surat Pernyataan"><i class="fa-solid fa-circle-check" style="color: #10b981; font-size: 1.1rem;"></i></a>
                        @else
                            <i class="fa-solid fa-circle-xmark" style="color: #cbd5e1; font-size: 1.1rem;"></i>
                        @endif
                    </td>

                    <!-- Document Complete Status -->
                    <td data-label="Status">
                        @if($student->uploaded_at)
                            <span class="badge badge-success">Lengkap</span>
                        @else
                            <span class="badge badge-warning">Belum Lengkap</span>
                        @endif
                        @if($student->allow_edit)
                            <div style="margin-top: 0.25rem;"><span class="badge" style="background-color: #3b82f6; color: #fff; font-size: 0.7rem;">Akses Edit Dibuka</span></div>
                        @endif
                        <div style="margin-top: 0.25rem;">
                            @if($student->verification_status === 'verified')
                                <span class="badge" style="background-color: #10b981; color: #fff; font-size: 0.7rem;">OK (Lolos)</span>
                            @elseif($student->verification_status === 'rejected')
                                <span class="badge" style="background-color: #ef4444; color: #fff; font-size: 0.7rem;">Revisi (Tidak OK)</span>
                            @else
                                <span class="badge" style="background-color: #6b7280; color: #fff; font-size: 0.7rem;">Belum Diverif</span>
                            @endif
                        </div>
                    </td>

                    <!-- Action Buttons -->
                    <td data-label="Aksi" class="action-btns" style="text-align: center; display: flex; justify-content: center; gap: 0.35rem; align-items: center; min-height: 45px;">
                        <button type="button" class="btn-edit view-biodata" data-student="{{ json_encode($student) }}" title="Lihat Biodata" style="background-color: var(--primary-color); color: #fff; border: none; padding: 0.35rem 0.6rem; border-radius: 4px; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; height: 28px; width: 28px; margin: 0;"><i class="fa-solid fa-address-card"></i></button>
                        <a href="{{ route('admin.ppdb.print-student', $student->id) }}" target="_blank" class="btn-sm" title="Cetak Biodata Calon Siswa" style="background-color: #0b63c5; color: #fff; border: none; padding: 0.35rem 0.6rem; border-radius: 4px; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; height: 28px; width: 28px; text-decoration: none; margin: 0;"><i class="fa-solid fa-print"></i></a>
                        <a href="{{ route('admin.ppdb.download-zip', $student->id) }}" class="btn-sm" title="Unduh Berkas ZIP" style="background-color: #10b981; color: #fff; border: none; padding: 0.35rem 0.6rem; border-radius: 4px; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; height: 28px; width: 28px; text-decoration: none; margin: 0;"><i class="fa-solid fa-file-zipper"></i></a>
                        <form action="{{ route('admin.ppdb.toggle-edit', $student->id) }}" method="POST" style="display:inline-flex; margin: 0;">
                            @csrf
                            <button type="submit" class="btn-sm" title="{{ $student->allow_edit ? 'Kunci & Tutup Akses Edit' : 'Buka Akses Edit' }}" style="background-color: {{ $student->allow_edit ? '#3b82f6' : '#64748b' }}; color: #fff; border: none; padding: 0.35rem 0.6rem; border-radius: 4px; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; height: 28px; width: 28px; margin: 0;"><i class="fa-solid {{ $student->allow_edit ? 'fa-lock-open' : 'fa-lock' }}"></i></button>
                        </form>
                        <form action="{{ route('admin.ppdb.reset-student', $student->id) }}" method="POST" style="display:inline-flex; margin: 0;" onsubmit="return confirm('Apakah Anda yakin ingin mereset biodata dan menghapus seluruh berkas milik siswa ini?')">
                            @csrf
                            <button type="submit" class="btn-sm" title="Reset Biodata & Berkas" style="background-color: #f59e0b; color: #fff; border: none; padding: 0.35rem 0.6rem; border-radius: 4px; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; height: 28px; width: 28px; margin: 0;"><i class="fa-solid fa-rotate-left"></i></button>
                        </form>
                        <form action="{{ route('admin.ppdb.delete-student', $student->id) }}" method="POST" style="display:inline-flex; margin: 0;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data siswa ini beserta berkas yang telah diunggahnya?')">
                            @csrf
                            <button type="submit" class="btn-sm btn-delete" title="Hapus Data Siswa" style="margin: 0; display: inline-flex; align-items: center; justify-content: center; height: 28px; width: 28px;"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" style="text-align: center; padding: 4rem; color: var(--text-muted);">
                        <i class="fa-solid fa-users-slash" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.2;"></i>
                        <p>Belum ada data siswa baru yang diimpor atau ditemukan.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination Links -->
<div class="pagination-wrapper" style="margin-top: 2rem;">
    {{ $students->appends(request()->query())->links() }}
</div>
