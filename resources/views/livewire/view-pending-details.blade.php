<div>

<div class="col"  id="leavePending" style="width: 100%; padding: 0;border-radius: 5px; ">
   @if(!empty($this->leaveApplications))
        @foreach($this->leaveApplications as $leaveRequest)
            <div class="approved-leave-container mt-1 px-1"  style="border-radius: 5px; " >
                <div class="accordion rounded mb-4 p-0">
                    <div class="accordion-heading rounded m-0 p-0"  onclick="toggleAccordion(this)">
                        <div class="accordion-title rounded m-0 p-1">
                            <!-- Display leave details here based on $leaveRequest -->
                            <div class="accordion-content">
                             <div class="accordion-profile" style="display:flex; gap:7px; margin:auto 0;align-items:center;justify-content:center;">
                             @if(isset($leaveRequest['leaveRequest']->image))
                                <img src="{{ $leaveRequest['leaveRequest']->image }}" alt="User Profile Image" style="width: 40px; height: 40px; border-radius: 50%;">
                                        @else
                                        <img src="https://w7.pngwing.com/pngs/178/595/png-transparent-user-profile-computer-icons-login-user-avatars.png" alt="Default User Image" style="width: 45px; height: 45px; border-radius: 50%;">
                                        @endif
                                        <div>
                                            @if(isset($leaveRequest['leaveRequest']->first_name))
                                            <p style="font-size: 12px; font-weight: 500; text-align: center;margin: auto;">{{ $leaveRequest['leaveRequest']->first_name }}  {{ $leaveRequest['leaveRequest']->last_name }} <br>
                                            @if(isset($leaveRequest['leaveRequest']->emp_id))
                                                <span style="color: #778899; font-size: 11px; text-align: start;">#{{ $leaveRequest['leaveRequest']->emp_id }} </span>
                                            @endif
                                            </p>
                                            @else
                                                <p style="font-size: 12px; font-weight: 500;">Name Not Available</p>
                                            @endif
                                        </div>
                                 </div>
                            </div>
                         
                            <div class="accordion-content">
                                <p style="color: #778899; font-size: 12px; font-weight: 500;">Leave Type <br>
                                @if(isset($leaveRequest['leaveRequest']->leave_type))
                                    <span style="color: #36454F; font-size: 12px; font-weight: 500;">{{ $leaveRequest['leaveRequest']->leave_type }}</span>
                                @else
                                    <span style="color: #778899; font-size: 10px;">Leave Type Not Available</span>
                                @endif
                                </p>
                            </div>

                            <div class="accordion-content">
                                <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <p style="color: #778899; font-size: 12px; font-weight: 500; text-align: center;">
                                        Period <br>
                                        <span style="color: #333; font-size: 12px; font-weight: 500;">
                                            @if(isset($leaveRequest['leaveRequest']->created_at))
                                                {{ $leaveRequest['leaveRequest']->created_at->format('d M, Y') }}
                                            @else
                                                Date Not Available
                                            @endif
                                        </span> <br>
                                        <span style="color: #36454F; font-size:10px; font-weight: 400;">
                                            @php
                                                $numberOfDays = $this->calculateNumberOfDays($leaveRequest['leaveRequest']->from_date, $leaveRequest['leaveRequest']->from_session, $leaveRequest['leaveRequest']->to_date, $leaveRequest['leaveRequest']->to_session);
                                            @endphp

                                            @if($numberOfDays == 1)
                                                <span style="color: #778899; font-size: 11px;">Full Day</span>
                                            @elseif($numberOfDays == 0.5)
                                                <span style="color: #778899; font-size: 11px;">Half Day</span>
                                            @else
                                                <span style="color: #36454F; font-size: 10px; font-weight: 400;">{{ $numberOfDays }} days</span>
                                            @endif
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <!-- Add other details based on your leave request structure -->
                            <div class="arrow-btn " >
                               <i class="fa fa-angle-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-body p-0 m-0">
                      <div style="width:100%; height:1px; border-bottom:1px solid #ccc; margin-bottom:10px;"></div>
                        <div class="content1 px-2">
                           <span style="color: #333; font-size: 12px; font-weight: 500;">No. of days :</span>
                                @if(isset($leaveRequest['leaveRequest']->from_date))
                                    <span style="color: #778899; font-size: 11px ;font-weight: 400;">
                                        {{ $this->calculateNumberOfDays($leaveRequest['leaveRequest']->from_date, $leaveRequest['leaveRequest']->from_session, $leaveRequest['leaveRequest']->to_date, $leaveRequest['leaveRequest']->to_session) }}
                                    </span>
                                @else
                                    <span style="color: #778899; font-size: 12px; font-weight: 400;">No. of days not available</span>
                                @endif
                            </div>
                        <div class="content1 px-2">
                          <span style="color: #333; font-size: 12px; font-weight: 500;">Reason :</span>
                          @if(isset($leaveRequest['leaveRequest']->reason))
                                <span style="font-size: 11px; color:#778899">{{ ucfirst($leaveRequest['leaveRequest']->reason) }}</span>
                            @else
                                <span style="font-size: 10px; color:#778899">Reason Not Available</span>
                            @endif
                        </div>
                         <div style="width:100%; height:1px; border-bottom:1px solid #ccc; margin-bottom:10px;"></div>
                        <div style="display:flex; flex-direction:row; justify-content:space-between;">
                          <div class="content1 px-2">
                                <span style="color: #778899; font-size: 12px; font-weight: 500;">Applied On <br>
                                @if(isset($leaveRequest['leaveRequest']->created_at))
                                    <span style="color: #333; font-size: 11px; font-weight: 500;">
                                        {{ $leaveRequest['leaveRequest']->created_at->format('d M, Y') }}
                                   </span>
                                @else
                                    <span style="color: #333; font-size: 12px; font-weight: 400;">No. of days not available</span>
                                @endif
                               </span> 
                            </div>
                            <div class="content2">
                                <span style="color: #778899; font-size: 12px; font-weight: 500;">Leave Balance:</span>
                                @if(!empty($leaveRequest['leaveBalances']))
                                        <div style=" flex-direction:row; display: flex; align-items: center;justify-content:center;">
                                        <!-- Sick Leave -->
                                            <div style="width: 20px; height: 20px; border-radius: 50%; background-color: #e6e6fa; display: flex; align-items: center; justify-content: center; margin-left:15px;">
                                                <span style="font-size:10px; color: #50327c;font-weight:500;">SL</span>
                                        </div>
                                            <span style="font-size: 12px; font-weight: 500; color: #333; margin-left: 5px;">{{ $leaveRequest['leaveBalances']['sickLeaveBalance'] }}</span>


                                        <!-- Casual Leave -->
                                        <div style="width: 20px; height: 20px; border-radius: 50%; background-color: #e7fae7; display: flex; align-items: center; justify-content: center; margin-left: 15px;">
                                                <span style="font-size:10px; color: #1d421e;font-weight:500;">CL</span>
                                        </div>
                                            <span style="font-size: 12px; font-weight: 500; color: #333; margin-left: 5px;">{{ $leaveRequest['leaveBalances']['casualLeaveBalance'] }}</span>
                                        <!-- Loss of Pay -->
                                        <div style="width: 20px; height: 20px; border-radius: 50%; background-color: #ffebeb; display: flex; align-items: center; justify-content: center; margin-left: 15px;">
                                                <span style="font-size:10px; color: #890000;font-weight:500;">LP</span>
                                        </div>
                                            <span style="font-size: 12px; font-weight: 500; color: #333; margin-left: 5px;">{{ $leaveRequest['leaveBalances']['lossOfPayBalance'] }}</span>
                                    </div>
                                @endif
                            </div>
                            

                            <div class="content1">
                                <a href="{{ route('view-details', ['leaveRequestId' => $leaveRequest['leaveRequest']->id]) }}" style="color:#007BFF;font-size:11px;">View Details</a>
                                <button class="rejectBtn" wire:click="rejectLeave({{ $loop->index }})">Reject</button>
                                <button class="rejectBtn" >Forward</button>
                                <button class="approveBtn btn-primary" wire:click="approveLeave({{ $loop->index }})">Approve</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="leave-pending" style="margin-top:30px; background:#fff; margin-left:120px; display:flex; width:75%;flex-direction:column; text-align:center;justify-content:center; border:1px solid #ccc; padding:20px;gap:10px;">
            <img src="/images/pending.png" alt="Pending Image" style="width:60%; margin:0 auto;">
            <p style="color:#969ea9; font-size:12px; font-weight:400; ">There are no pending records of any leave transaction to Review</p>
        </div>
    @endif
</div>
<script>
      function toggleAccordion(element) {
            const accordionBody = element.nextElementSibling;
            if (accordionBody.style.display === 'block') {
                accordionBody.style.display = 'none';
                element.classList.remove('active'); // Remove active class
            } else {
                accordionBody.style.display = 'block';
                element.classList.add('active'); // Add active class
            }
        }
</script>

</div>