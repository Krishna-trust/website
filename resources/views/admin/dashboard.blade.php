@extends('layouts.app')

@section('content')

<style>
/* ── Dashboard Mobile Responsive Fixes ── */

/* Welcome banner: stack stats below on xs */
.dash-banner-stats {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    justify-content: flex-end;
}
@media (max-width: 575.98px) {
    .dash-banner-stats {
        justify-content: center;
        width: 100%;
        gap: 0.5rem;
    }
    .dash-banner-stats .dash-stat-item {
        flex: 1 1 calc(33% - 0.5rem);
        min-width: 70px;
    }
    .dash-banner-stats .dash-stat-item .fw-bold { font-size: 1rem !important; }
}

/* Chart canvas containers: fixed height so canvas never collapses */
.chart-container {
    position: relative;
    width: 100%;
    height: 300px;
}
@media (max-width: 575.98px) {
    .chart-container { height: 220px; }
    .chart-container-doughnut { height: 260px; }
}
@media (min-width: 576px) and (max-width: 991.98px) {
    .chart-container { height: 260px; }
    .chart-container-doughnut { height: 280px; }
}
.chart-container-doughnut {
    position: relative;
    width: 100%;
    height: 300px;
}

/* ── KPI Stat Cards ── */
.stat-kpi-card {
    border: none;
    border-radius: 14px;
    background: #fff;
    box-shadow: 0 1px 6px rgba(0,0,0,0.07);
    transition: transform 0.18s ease, box-shadow 0.18s ease;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    text-decoration: none !important;
    display: block;
}
.stat-kpi-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 28px rgba(0,0,0,0.13) !important;
}
.stat-kpi-card .kpi-inner {
    padding: 14px 14px 12px;
    display: flex;
    align-items: center;
    gap: 12px;
}
.stat-kpi-card .kpi-icon {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.stat-kpi-card .kpi-icon svg { width: 20px; height: 20px; }
.stat-kpi-card .kpi-body { flex: 1; min-width: 0; }
.stat-kpi-label {
    font-size: 10.5px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    color: #9ba3b4;
    margin-bottom: 2px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.stat-kpi-count {
    font-size: 1.45rem;
    font-weight: 800;
    line-height: 1.15;
    letter-spacing: -0.5px;
    margin-bottom: 3px;
}
.stat-kpi-link {
    font-size: 10.5px;
    font-weight: 600;
    opacity: 0.55;
    transition: opacity 0.15s;
    display: inline-flex;
    align-items: center;
    gap: 3px;
}
.stat-kpi-card:hover .stat-kpi-link { opacity: 1; }
.stat-kpi-bar {
    height: 3px;
    width: 100%;
    border-radius: 0 0 14px 14px;
}
@media (max-width: 575.98px) {
    .stat-kpi-card .kpi-inner { padding: 11px 11px 10px; gap: 9px; }
    .stat-kpi-card .kpi-icon { width: 36px; height: 36px; border-radius: 10px; }
    .stat-kpi-count { font-size: 1.2rem; }
    .stat-kpi-label { font-size: 9.5px; }
}

/* Recent tables: tighter on mobile */
@media (max-width: 575.98px) {
    .dashboard-table td,
    .dashboard-table th { padding: 0.45rem 0.5rem; }
    .dashboard-table .avatar-circle { width: 26px !important; height: 26px !important; font-size: 10px !important; }
}
</style>

{{-- Page Header --}}
<div class="page-header mx-2">
    <div>
        <h1 class="page-title">{{ @trans('messages.dashboard') }}</h1>
    </div>
    <div class="ms-auto pageheader-btn d-none d-xl-flex d-lg-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ @trans('messages.dashboard') }}</li>
        </ol>
    </div>
</div>

{{-- Welcome Banner --}}
<div class="row mx-1">
    <div class="col-12">
        <div class="card border-0 text-white" style="background: linear-gradient(135deg, #1417a3 0%, #4ECDC4 100%); border-radius: 14px;">
            <div class="card-body py-3 px-3 px-md-4 d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <h4 class="fw-bold mb-1 text-white fs-6 fs-md-4">
                        Welcome back, {{ Auth::user()->name ?? 'Admin' }}!
                    </h4>
                    <p class="mb-0 opacity-75 small d-none d-sm-block">
                        {{ now()->format('l, d F Y') }} &nbsp;|&nbsp; Krishna Niswarth Seva Trust &mdash; Admin Panel
                    </p>
                    <p class="mb-0 opacity-75 small d-block d-sm-none">
                        {{ now()->format('d M Y') }}
                    </p>
                </div>
                <div class="dash-banner-stats">
                    <div class="dash-stat-item text-center">
                        <div class="fw-bold fs-6">{{ $total_donations_amount ? '₹ ' . number_format($total_donations_amount, 0) : '₹ 0' }}</div>
                        <div class="small opacity-75" style="font-size:11px;">Collected</div>
                    </div>
                    <div class="vr opacity-50 d-none d-md-block"></div>
                    <div class="dash-stat-item text-center">
                        <div class="fw-bold fs-6">{{ $total_labharthi }}</div>
                        <div class="small opacity-75" style="font-size:11px;">Beneficiaries</div>
                    </div>
                    <div class="vr opacity-50 d-none d-md-block"></div>
                    <div class="dash-stat-item text-center">
                        <div class="fw-bold fs-6">{{ $total_employees }}</div>
                        <div class="small opacity-75" style="font-size:11px;">Employees</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Stats Cards Row --}}
<div class="row mx-1 mb-4 g-2 g-md-3 mb-1 row-cols-1 row-cols-md-3 row-cols-lg-5">

    {{-- Donations Amount --}}
    <div class="col">
        <a href="{{ route('admin.donation.index') }}" class="stat-kpi-card">
            <div class="kpi-inner">
                <div class="kpi-icon" style="background:rgba(20,23,163,0.1);">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 14.93V18h-2v-1.07C9.28 16.54 8 15.38 8 14h2c0 .55.9 1 2 1s2-.45 2-1c0-.56-.44-.67-1.8-1.04C10.72 12.56 8 11.88 8 10c0-1.38 1.28-2.54 3-2.93V6h2v1.07c1.72.39 3 1.55 3 2.93h-2c0-.55-.9-1-2-1s-2 .45-2 1c0 .56.44.67 1.8 1.04C13.28 11.44 16 12.12 16 14c0 1.38-1.28 2.54-3 2.93z" fill="#1417a3"/>
                    </svg>
                </div>
                <div class="kpi-body">
                    <div class="stat-kpi-label">Donations</div>
                    <div class="stat-kpi-count" style="color:#1417a3;">₹ {{ number_format($total_donations_amount ?? 0, 0) }}</div>
                    <span class="stat-kpi-link" style="color:#1417a3;">View all <i class="fa fa-arrow-right" style="font-size:9px;"></i></span>
                </div>
            </div>
            <div class="stat-kpi-bar" style="background:linear-gradient(90deg,#1417a3,#4ECDC4);"></div>
        </a>
    </div>

    {{-- Donors Count --}}
    <div class="col">
        <a href="{{ route('admin.donation.index') }}" class="stat-kpi-card">
            <div class="kpi-inner">
                <div class="kpi-icon" style="background:rgba(28,200,138,0.1);">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke="#1cc88a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="kpi-body">
                    <div class="stat-kpi-label">Total Donors</div>
                    <div class="stat-kpi-count" style="color:#1cc88a;">{{ $total_donations ?? 0 }}</div>
                    <span class="stat-kpi-link" style="color:#1cc88a;">View all <i class="fa fa-arrow-right" style="font-size:9px;"></i></span>
                </div>
            </div>
            <div class="stat-kpi-bar" style="background:linear-gradient(90deg,#1cc88a,#36d399);"></div>
        </a>
    </div>

    {{-- Labharthi --}}
    <div class="col">
        <a href="{{ route('admin.labharthi.index') }}" class="stat-kpi-card">
            <div class="kpi-inner">
                <div class="kpi-icon" style="background:rgba(246,194,62,0.12);">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" stroke="#f6c23e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="kpi-body">
                    <div class="stat-kpi-label">Labharthi</div>
                    <div class="stat-kpi-count" style="color:#e0a800;">{{ $total_labharthi ?? 0 }}</div>
                    <span class="stat-kpi-link" style="color:#e0a800;">View all <i class="fa fa-arrow-right" style="font-size:9px;"></i></span>
                </div>
            </div>
            <div class="stat-kpi-bar" style="background:linear-gradient(90deg,#f6c23e,#f46a1f);"></div>
        </a>
    </div>

    {{-- Expenses --}}
    <div class="col">
        <a href="{{ route('admin.expense.index') }}" class="stat-kpi-card">
            <div class="kpi-inner">
                <div class="kpi-icon" style="background:rgba(231,74,59,0.1);">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 14l6-6m0 0v4m0-4h-4M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" stroke="#e74a3b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="kpi-body">
                    <div class="stat-kpi-label">Expenses</div>
                    <div class="stat-kpi-count" style="color:#e74a3b;">₹ {{ number_format($total_expenses_amount ?? 0, 0) }}</div>
                    <span class="stat-kpi-link" style="color:#e74a3b;">View all <i class="fa fa-arrow-right" style="font-size:9px;"></i></span>
                </div>
            </div>
            <div class="stat-kpi-bar" style="background:linear-gradient(90deg,#e74a3b,#ff6b6b);"></div>
        </a>
    </div>

    {{-- Employees --}}
    <div class="col">
        <a href="{{ route('admin.employee.index') }}" class="stat-kpi-card">
            <div class="kpi-inner">
                <div class="kpi-icon" style="background:rgba(78,205,196,0.12);">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke="#4ECDC4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="kpi-body">
                    <div class="stat-kpi-label">Employees</div>
                    <div class="stat-kpi-count" style="color:#4ECDC4;">{{ $total_employees ?? 0 }}</div>
                    <span class="stat-kpi-link" style="color:#4ECDC4;">View all <i class="fa fa-arrow-right" style="font-size:9px;"></i></span>
                </div>
            </div>
            <div class="stat-kpi-bar" style="background:linear-gradient(90deg,#4ECDC4,#1417a3);"></div>
        </a>
    </div>

    {{-- Content --}}
    {{-- <div class="col">
        <a href="{{ route('admin.contents.index') }}" class="stat-kpi-card">
            <div class="kpi-inner">
                <div class="kpi-icon" style="background:rgba(108,117,125,0.1);">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke="#6c757d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="kpi-body">
                    <div class="stat-kpi-label">Content</div>
                    <div class="stat-kpi-count" style="color:#6c757d;">{{ $total_contents ?? 0 }}</div>
                    <span class="stat-kpi-link" style="color:#6c757d;">View all <i class="fa fa-arrow-right" style="font-size:9px;"></i></span>
                </div>
            </div>
            <div class="stat-kpi-bar" style="background:linear-gradient(90deg,#6c757d,#adb5bd);"></div>
        </a>
    </div> --}}

</div>

{{-- Charts Row --}}
<div class="row mx-1 g-3 mb-3">

    {{-- Monthly Donations Chart --}}
    <div class="col-12 col-lg-8">
        <div class="card h-100">
            <div class="card-header bg-white border-bottom d-flex align-items-center justify-content-between py-3 px-3">
                <h6 class="mb-0 fw-semibold">
                    <i class="fa fa-bar-chart me-2 text-primary"></i>
                    Monthly Donations — {{ now()->year }}
                </h6>
            </div>
            <div class="card-body p-2 p-md-3">
                <div class="chart-container">
                    <canvas id="monthlyDonationsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- Donation by Payment Mode --}}
    <div class="col-12 col-lg-4">
        <div class="card h-100">
            <div class="card-header bg-white border-bottom d-flex align-items-center justify-content-between py-3 px-3">
                <h6 class="mb-0 fw-semibold">
                    <i class="fa fa-pie-chart me-2 text-success"></i>
                    Payment Modes
                </h6>
            </div>
            <div class="card-body d-flex flex-column align-items-center justify-content-center p-2 p-md-3">
                @if(count($donation_by_mode) > 0)
                    <div class="chart-container-doughnut w-100">
                        <canvas id="paymentModeChart"></canvas>
                    </div>
                @else
                    <div class="text-center text-muted py-5">
                        <i class="fa fa-pie-chart fa-3x mb-3 opacity-25"></i>
                        <p class="mb-0">No payment data available</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

{{-- Recent Activity Row --}}
<div class="row mx-1 g-3 mb-3">

    {{-- Recent Donations Table --}}
    <div class="col-12 col-lg-7">
        <div class="card h-100">
            <div class="card-header bg-white border-bottom d-flex align-items-center justify-content-between py-3 px-3">
                <h6 class="mb-0 fw-semibold">
                    <i class="fa fa-clock-o me-2 text-primary"></i>
                    Recent Donations
                </h6>
                <a href="{{ route('admin.donation.index') }}" class="">
                    View All
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 dashboard-table">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3 small text-muted fw-semibold">Name</th>
                                <th class="small text-muted fw-semibold">Amount</th>
                                <th class="small text-muted fw-semibold d-none d-sm-table-cell">Mode</th>
                                <th class="small text-muted fw-semibold d-none d-md-table-cell">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recent_donations as $donation)
                            <tr>
                                <td class="ps-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-circle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                            style="width:32px;height:32px;background:linear-gradient(135deg,#1417a3,#4ECDC4);font-size:12px;font-weight:700;color:#fff;">
                                            {{ strtoupper(substr($donation->full_name ?? 'D', 0, 1)) }}
                                        </div>
                                        <span class="fw-medium small">{{ $donation->full_name }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-semibold text-success small">₹ {{ number_format($donation->amount, 0) }}</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge bg-light text-dark small">{{ $donation->payment_mode ?? '—' }}</span>
                                </td>
                                <td class="d-none d-md-table-cell">
                                    <span class="text-muted small">
                                        {{ $donation->created_at ? $donation->created_at->format('d M Y') : '—' }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    <i class="fa fa-inbox fa-2x mb-2 d-block opacity-25"></i>
                                    No donations yet
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent Labharthi Table --}}
    <div class="col-12 col-lg-5">
        <div class="card h-100">
            <div class="card-header bg-white border-bottom d-flex align-items-center justify-content-between py-3 px-3">
                <h6 class="mb-0 fw-semibold">
                    <i class="fa fa-users me-2 text-warning"></i>
                    Recent Labharthi
                </h6>
                <a href="{{ route('admin.labharthi.index') }}" class="text-warning">
                    View All
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 dashboard-table">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3 small text-muted fw-semibold">Name</th>
                                <th class="small text-muted fw-semibold d-none d-sm-table-cell">Category</th>
                                <th class="small text-muted fw-semibold">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recent_labharthi as $l)
                            <tr>
                                <td class="ps-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-circle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                            style="width:32px;height:32px;background:linear-gradient(135deg,#f6c23e,#f46a1f);font-size:12px;font-weight:700;color:#fff;">
                                            {{ strtoupper(substr($l->name ?? 'L', 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="fw-medium small">{{ $l->name }}</div>
                                            <div class="text-muted" style="font-size:11px;">{{ $l->labharthi_number }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="small text-muted">{{ $l->category ?? '—' }}</span>
                                </td>
                                <td>
                                    @if($l->status == 'active' || $l->status == 1)
                                        <span class="badge bg-success-subtle text-success" style="font-size:11px;">Active</span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary" style="font-size:11px;">{{ ucfirst($l->status ?? 'N/A') }}</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-4">
                                    <i class="fa fa-inbox fa-2x mb-2 d-block opacity-25"></i>
                                    No records yet
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    // ── Monthly Donations Bar + Trend Chart ─────────────────────────────
    var monthlyCtx = document.getElementById('monthlyDonationsChart');
    if (monthlyCtx) {
        var monthlyData = @json($monthly_chart_data);

        var ctx2d = monthlyCtx.getContext('2d');
        var barGradient = ctx2d.createLinearGradient(0, 0, 0, 320);
        barGradient.addColorStop(0,   'rgba(20, 23, 163, 0.85)');
        barGradient.addColorStop(0.6, 'rgba(78, 205, 196, 0.55)');
        barGradient.addColorStop(1,   'rgba(78, 205, 196, 0.10)');

        var maxVal = Math.max.apply(null, monthlyData);
        var suggestedMax = Math.max(maxVal * 1.25, 10000);

        function rupeeLabel(val) {
            if (val >= 10000000) return '₹' + (val / 10000000).toFixed(1) + 'Cr';
            if (val >= 100000)   return '₹' + (val / 100000).toFixed(1) + 'L';
            if (val >= 1000)     return '₹' + (val / 1000).toFixed(0) + 'K';
            return '₹' + val;
        }

        var isMobile = window.innerWidth < 576;

        new Chart(monthlyCtx, {
            type: 'bar',
            data: {
                labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
                datasets: [
                    {
                        label: 'Donations (₹)',
                        data: monthlyData,
                        backgroundColor: barGradient,
                        borderColor: '#1417a3',
                        borderWidth: 1.5,
                        borderRadius: 6,
                        borderSkipped: false,
                        order: 2,
                    },
                    {
                        label: 'Trend',
                        data: monthlyData,
                        type: 'line',
                        borderColor: '#4ECDC4',
                        borderWidth: 2,
                        pointBackgroundColor: '#fff',
                        pointBorderColor: '#4ECDC4',
                        pointBorderWidth: 2,
                        pointRadius: isMobile ? 2 : 4,
                        pointHoverRadius: 5,
                        fill: false,
                        tension: 0.45,
                        order: 1,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: { mode: 'index', intersect: false },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        align: 'end',
                        labels: {
                            boxWidth: 10,
                            padding: 12,
                            font: { size: isMobile ? 10 : 12 },
                            usePointStyle: true,
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(20,23,163,0.92)',
                        titleColor: '#fff',
                        bodyColor: 'rgba(255,255,255,0.85)',
                        padding: 10,
                        cornerRadius: 8,
                        callbacks: {
                            label: function(ctx) {
                                if (ctx.dataset.label === 'Trend') return null;
                                var v = ctx.parsed.y;
                                return '  ₹ ' + v.toLocaleString('en-IN');
                            },
                            afterBody: function(items) {
                                var v = items[0] ? items[0].parsed.y : 0;
                                if (v >= 100000) return ['  (' + (v/100000).toFixed(2) + ' Lakh)'];
                                if (v >= 1000)   return ['  (' + (v/1000).toFixed(1) + 'K)'];
                                return [];
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMax: suggestedMax,
                        grid: { color: 'rgba(0,0,0,0.05)', drawTicks: false },
                        border: { dash: [4, 4], display: false },
                        ticks: {
                            padding: 6,
                            font: { size: isMobile ? 9 : 11 },
                            maxTicksLimit: isMobile ? 5 : 8,
                            callback: function(val) { return rupeeLabel(val); }
                        }
                    },
                    x: {
                        grid: { display: false },
                        ticks: {
                            font: { size: isMobile ? 9 : 11 },
                            padding: 4,
                            maxRotation: isMobile ? 45 : 0,
                        }
                    }
                }
            }
        });
    }

    // ── Payment Mode Doughnut Chart ──────────────────────────────────────
    var modeCtx = document.getElementById('paymentModeChart');
    if (modeCtx) {
        var modeData   = @json(array_values($donation_by_mode));
        var modeLabels = @json(array_keys($donation_by_mode));
        new Chart(modeCtx, {
            type: 'doughnut',
            data: {
                labels: modeLabels.map(function(l){ return l || 'Unknown'; }),
                datasets: [{
                    data: modeData,
                    backgroundColor: [
                        'rgba(20,23,163,0.75)',
                        'rgba(78,205,196,0.75)',
                        'rgba(246,194,62,0.75)',
                        'rgba(231,74,59,0.75)',
                        'rgba(28,200,138,0.75)',
                        'rgba(108,117,125,0.75)',
                    ],
                    borderWidth: 0,
                    hoverOffset: 8,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '65%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { boxWidth: 10, padding: 12, font: { size: 11 } }
                    }
                }
            }
        });
    }

});
</script>
@endsection
