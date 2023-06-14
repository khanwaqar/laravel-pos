<div class="modal-content" id="showCustomer">
    @php
        $avatar = asset('/images/placeholder.png');
        if (trim($customer->avatar) != 'no-foto.png') {
            $avatar = $customer->fileUrl();
        }
    @endphp
    <section class="pt-3 px-4">
      <h2 class="mt-3"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          {{__('Customer Profile')}}</h2>
    </section>
      
      <!-- Main content -->
    <section class="content px-3">
      @include('partials.flash')
        <div class="row">
          <div class="col-md-12">
            <!-- Profile Image -->
            <div class="box box-success">
              <div class=" box-profile">
                <div class="row">
                  <div class="col-md-3">
                    <img class="profile-user-img img-responsive img-rounded" src="{{$avatar}}" alt="User profile picture">
                  </div>
                  <div class="col-md-9">
                    <h3 class="profile-username text-left">{{$customer->name}}</h3>
                    <ul class="list-group list-group-unbordered">
                      <li class="list-group-item">
                        <b>{{__('Balance')}} </b> <a class="">{{currencySymbol().$customer->prev_balance}}</a><a class="btn btn-success ml-4 hidden-print" href="#" data-toggle="modal" data-target="#customerPaymentModal"><b>{{__('Add Payment')}}</b></a>
                      </li>
                      <li class="list-group-item hidden-print">
                        <b>{{__('Total Sales')}} </b> <a class="">{{$total_sales}}</a>
                      </li>
                    </ul>
                    
                    <!--Customer Payment Modal start-->
                    <div class="modal submodal" id="customerPaymentModal" role="dialog">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" onclick="closeEl('.submodal', '#customerPaymentModal')">&times;</button>
                            <h4 class="modal-title">{{__('Add Payment')}}</h4>
                          </div>
                          <div class="modal-body">
                            {{ Form::open(['route'=>'customerpayments.store']) }}
                              <div class="form-group">
                                  {{ Form::select('payment_type', $payment_types, null, array('class' => 'form-control','placeholder'=>'Select payment type','required')) }}
                              </div>
                              <div class="form-group"><!---select account input-->
                                  {{Form::select('account_id', $accounts, null, ['class'=>'form-control', 'placeholder'=>'Select Account', 'required'])}}
                              </div>
                              <div class="form-group">
                                {{ Form::hidden('customer_id', $customer->id, ['class'=>'form-control']) }}
                                {{ Form::number('payment', null, ['class'=>'form-control', 'placeholder'=>'Amount', 'required']) }}
                              </div>
                              <div class="form-group">
                                {{ Form::text('comments', null, ['class'=>'form-control','placeholder'=>'Comments']) }}
                              </div>
                              <div class="form-group">
                                {{ Form::submit('Add Payment', ['class'=>'btn btn-success', 'onclick'=>"$('.modal-backdrop').remove()"]) }}
                              </div>
                            {{ Form::close() }}
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-success" onclick="closeEl('.submodal', '#customerPaymentModal')">{{__('Close')}}</button>
                          </div>
                        </div>
                      </div>
                    </div><!--Customer Payment Modal End-->
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
            
           <!-- About Me Box -->
           
            <!-- /.box -->
      
          </div>
          <!-- /.col -->
          <div class="col-md-3">
            @if(count($customer_payments) || count($sale_payments))
            <div class="box box-success">
              <div class="with-border">
                <h3 class="mt-0">{{__('Payment History')}}</h3>
              </div>
              <!-- /.box-header -->
              <div class=" p-0">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th>{{__('Date')}}</th>
                      <th>{{__('Payment')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($customer_payments as $customer_payment)
                    <tr>
                      <td>{{$customer_payment->created_at->format('M d')}}</td>
                      <td>{{currencySymbol().$customer_payment->payment}}</td>
                    </tr>
                    @endforeach
                    <tr>
                      <td colspan="3" style="background: #00a65a;padding: 2px;"></td>
                    </tr>
                    @foreach($sale_payments as $sale_payment)
                    <tr>
                      <td>{{$sale_payment->created_at->format('M d')}}</td>
                      <td>{{currencySymbol().$sale_payment->payment}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            @endif
          </div>
          <div class="col-md-9">
            <h3 class="mt-0">All Sales</h3>
            @include('customer.partials.sale_table', ['salereport'=>$sales, 'type'=>'customer'])
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div>