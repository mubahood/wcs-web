<?php
use App\Models\Utils;
?><style>
    .ext-icon {
        color: rgba(0, 0, 0, 0.5);
        margin-left: 10px;
    }

    .installed {
        color: #00a65a;
        margin-right: 10px;
    }

    .card {
        border-radius: 5px;
    }

    .case-item:hover {
        background-color: rgb(254, 254, 254);
    }
</style>
<div class="card  mb-4 mb-md-5 border-0">
    <!--begin::Header-->
    <div class="d-flex justify-content-between px-3 px-md-4 ">
        <h3>
            <b>Recent cases</b>
        </h3>
        <div>
            <a href="{{ url('/cases') }}" class="btn btn-sm btn-primary mt-md-4 mt-4">
                View All
            </a>
        </div>
    </div>
    <div class="card-body py-2 py-md-3">
        @foreach ($items as $i)
            <div class="d-flex align-items-center mb-4 case-item">
                <div style="border-left: solid red 5px;"
                    class="flex-grow-1 pl-2 pl-md-3 border-{{ Utils::tell_case_status_color($i->status) }}">
                    <a href="{{ url("/cases/{$i->id}") }}" class="text-dark text-hover-primary">
                        <b>{{ $i->title }}</b>
                    </a>
                    <span class="text-muted fw-bold d-block">{{ Utils::my_time_ago($i->created_at) }}</span>
                </div> 
                <b
                    class="badge bg-{{ Utils::tell_case_status_color($i->status) }} ">{{ Utils::tell_case_status($i->status) }}</b>
            </div>
        @endforeach
    </div>
</div>