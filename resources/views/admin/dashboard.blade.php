@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-success mb-1">Dashboard</h2>
        <p class="text-muted mb-0">Selamat datang, <strong>{{ Auth::user()->name }}</strong></p>
    </div>
    <div class="text-end">
        <small class="text-muted"><i class="bi bi-calendar"></i> {{ date('d F Y') }}</small>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card border-start border-success border-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted mb-1 small">Total Booking Servis</p>
                    <h3 class="fw-bold text-success mb-0">{{ \App\Models\Booking::count() }}</h3>
                    <small class="text-success"><i class="bi bi-arrow-up"></i> Data tercatat</small>
                </div>
                <div class="bg-success bg-opacity-10 p-3 rounded-circle">
                    <i class="bi bi-calendar-check fs-2 text-success"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card border-start border-warning border-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted mb-1 small">Total Sparepart</p>
                    <h3 class="fw-bold text-warning mb-0">{{ \App\Models\Sparepart::count() }}</h3>
                    <small class="text-warning"><i class="bi bi-box"></i> Produk aktif</small>
                </div>
                <div class="bg-warning bg-opacity-10 p-3 rounded-circle">
                    <i class="bi bi-box-seam fs-2 text-warning"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card border-start border-info border-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted mb-1 small">Jumlah Order</p>
                    <h3 class="fw-bold text-info mb-0">{{ \App\Models\Order::count() }}</h3>
                    <small class="text-info"><i class="bi bi-cart"></i> Total order</small>
                </div>
                <div class="bg-info bg-opacity-10 p-3 rounded-circle">
                    <i class="bi bi-cart-check fs-2 text-info"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card border-start border-danger border-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted mb-1 small">Total Article</p>
                    <h3 class="fw-bold text-danger mb-0">{{ \App\Models\Article::count() }}</h3>
                    <small class="text-danger"><i class="bi bi-file-text"></i> Article workshop</small>
                </div>
                <div class="bg-danger bg-opacity-10 p-3 rounded-circle">
                    <i class="bi bi-file-earmark-text fs-2 text-danger"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-gradient text-white" style="background: linear-gradient(135deg, #4CAF50, #81C784);">
                <h5 class="mb-0"><i class="bi bi-bar-chart-line"></i> Statistik Order</h5>
            </div>
            <div class="card-body">
                @php
                    $pending = \App\Models\Order::where('status', 'pending')->count();
                    $diproses = \App\Models\Order::where('status', 'diproses')->count();
                    $selesai = \App\Models\Order::where('status', 'selesai')->count();
                    $dibatalkan = \App\Models\Order::where('status', 'dibatalkan')->count();
                    $total = $pending + $diproses + $selesai + $dibatalkan;
                @endphp
                
                <div class="row text-center mb-4">
                    <div class="col-3">
                        <div class="p-3 bg-warning bg-opacity-10 rounded">
                            <h4 class="fw-bold text-warning mb-0">{{ $pending }}</h4>
                            <small class="text-muted">Pending</small>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="p-3 bg-info bg-opacity-10 rounded">
                            <h4 class="fw-bold text-info mb-0">{{ $diproses }}</h4>
                            <small class="text-muted">Diproses</small>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="p-3 bg-success bg-opacity-10 rounded">
                            <h4 class="fw-bold text-success mb-0">{{ $selesai }}</h4>
                            <small class="text-muted">Selesai</small>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="p-3 bg-danger bg-opacity-10 rounded">
                            <h4 class="fw-bold text-danger mb-0">{{ $dibatalkan }}</h4>
                            <small class="text-muted">Dibatalkan</small>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Pending</span>
                        <span class="fw-bold text-warning">{{ $total > 0 ? round(($pending/$total)*100) : 0 }}%</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-warning" style="width: {{ $total > 0 ? ($pending/$total)*100 : 0 }}%"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Diproses</span>
                        <span class="fw-bold text-info">{{ $total > 0 ? round(($diproses/$total)*100) : 0 }}%</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-info" style="width: {{ $total > 0 ? ($diproses/$total)*100 : 0 }}%"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Selesai</span>
                        <span class="fw-bold text-success">{{ $total > 0 ? round(($selesai/$total)*100) : 0 }}%</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-success" style="width: {{ $total > 0 ? ($selesai/$total)*100 : 0 }}%"></div>
                    </div>
                </div>
                <div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Dibatalkan</span>
                        <span class="fw-bold text-danger">{{ $total > 0 ? round(($dibatalkan/$total)*100) : 0 }}%</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-danger" style="width: {{ $total > 0 ? ($dibatalkan/$total)*100 : 0 }}%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-gradient" style="background: linear-gradient(135deg, #FFD54F, #FFC107);">
                <h5 class="mb-0"><i class="bi bi-lightning-charge"></i> Menu Cepat</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-3">
                    <a href="{{ route('admin.booking.create') }}" class="btn btn-success btn-lg d-flex align-items-center justify-content-between">
                        <span><i class="bi bi-calendar-plus"></i> Input Booking Servis</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                    <a href="{{ route('admin.sparepart.create') }}" class="btn btn-info btn-lg d-flex align-items-center justify-content-between">
                        <span><i class="bi bi-plus-circle"></i> Tambah Sparepart</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                    <a href="{{ route('admin.order.index') }}" class="btn btn-primary btn-lg d-flex align-items-center justify-content-between">
                        <span><i class="bi bi-cart-check"></i> Lihat Order</span>
                        @if($pending > 0)
                        <span class="badge bg-white text-primary">{{ $pending }}</span>
                        @endif
                    </a>
                    <a href="{{ route('admin.article.create') }}" class="btn btn-warning btn-lg d-flex align-items-center justify-content-between">
                        <span><i class="bi bi-file-earmark-text"></i> Tulis Article</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><i class="bi bi-clock-history"></i> Aktivitas Terbaru</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="fw-bold text-success mb-3"><i class="bi bi-cart"></i> Order Terbaru</h6>
                        @php
                            $orderTerbaru = \App\Models\Order::with('sparepart')->latest()->take(5)->get();
                        @endphp
                        
                        @forelse($orderTerbaru as $order)
                        <div class="d-flex align-items-start mb-3 p-2 rounded hover-bg">
                            <div class="bg-info bg-opacity-10 p-2 rounded me-3">
                                <i class="bi bi-cart-plus text-info"></i>
                            </div>
                            <div class="flex-grow-1">
                                <strong>{{ $order->nama_pemesan }}</strong>
                                <br>
                                <small class="text-muted">{{ $order->sparepart->nama_produk }} - {{ $order->jumlah }} pcs</small>
                                <br>
                                <small class="text-muted"><i class="bi bi-clock"></i> {{ $order->created_at->diffForHumans() }}</small>
                            </div>
                            @if($order->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif($order->status == 'diproses')
                                <span class="badge bg-info">Diproses</span>
                            @elseif($order->status == 'selesai')
                                <span class="badge bg-success">Selesai</span>
                            @else
                                <span class="badge bg-danger">Dibatalkan</span>
                            @endif
                        </div>
                        @empty
                        <div class="text-center text-muted py-3">
                            <i class="bi bi-inbox fs-3"></i>
                            <p class="mt-2 mb-0">Belum ada order</p>
                        </div>
                        @endforelse
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold text-warning mb-3"><i class="bi bi-file-text"></i> Article Terbaru</h6>
                        @php
                            $articleTerbaru = \App\Models\Article::with('user')->latest()->take(5)->get();
                        @endphp
                        
                        @forelse($articleTerbaru as $article)
                        <div class="d-flex align-items-start mb-3 p-2 rounded hover-bg">
                            <div class="bg-warning bg-opacity-10 p-2 rounded me-3">
                                <i class="bi bi-file-text text-warning"></i>
                            </div>
                            <div class="flex-grow-1">
                                <strong>{{ Str::limit($article->judul, 40) }}</strong>
                                <br>
                                <small class="text-muted">Oleh {{ $article->user->name }}</small>
                                <br>
                                <small class="text-muted"><i class="bi bi-clock"></i> {{ $article->created_at->diffForHumans() }}</small>
                            </div>
                            @if($article->status == 'published')
                                <span class="badge bg-success">Published</span>
                            @else
                                <span class="badge bg-secondary">Draft</span>
                            @endif
                        </div>
                        @empty
                        <div class="text-center text-muted py-3">
                            <i class="bi bi-inbox fs-3"></i>
                            <p class="mt-2 mb-0">Belum ada article</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-bg:hover {
        background: rgba(76, 175, 80, 0.05);
        transition: all 0.2s ease;
    }
    .progress {
        border-radius: 10px;
        overflow: hidden;
    }
    .progress-bar {
        transition: width 1s ease;
    }
</style>
@endsection
