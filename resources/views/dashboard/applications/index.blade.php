@extends('layouts.dashboard')

@section('content')
   <!-- BEGIN: Content-->
   <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">

         <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>

         <x-dashboard.alerts/>

         <div class="content-body">
            <div class="card">
               <div class="card-content">
                  <div class="card-body">
                     <table class="table table-striped table-bordered" id="data-table">
                        <thead class="thead-dark">
                        <tr role="row">
                           <th style="width: 150px;">{{ __('Full name') }}</th>
                           <th style="width: 170px;">{{ __('Phone') }}</th>
                           <th>{{ __('Email') }}</th>
                           <th>{{ __('Received date') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($applications as $application)
                           <tr role="row">
                              <td>{{ $application->name }}</td>
                              <td>{{ $application->phone }}</td>
                              <td>{{ $application->email }}</td>
                              <td>{{ $application->created_at }}</td>
                           </tr>
                        @endforeach
                        </tbody>
                     </table>
                     {{ $applications->links() }}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- END: Content-->

   @push('data-table')
      <script>
          $(document).ready(function () {
              $('#data-table').DataTable({
                  paging: false,
                  order: [[3, 'desc']],
                  scrollY: false
              });

              $('#data-table_info').parents('.row').remove();
          });
      </script>
   @endpush
@endsection
