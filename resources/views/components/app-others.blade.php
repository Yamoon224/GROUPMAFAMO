<div class="fixed top-0 right-0 flex flex-col xl:w-[800px] md:w-[500px] w-[350px] h-[100vh] z-[1045] bg-white dark:bg-[#1E1E1E] text-body-color duration-500 ease-in-out offcanvas is-closed" id="offcanvasExample2">
    <div class="ml-4 flex items-center justify-between p-4">
            <h5 class="modal-title" id="#gridSystemModal">Add Employee</h5>
            <button type="button" class="offcanvas-close h-6 w-6 box-content bg-danger-light rounded-md text-lg mr-4 p-2 opacity-50 hover:opacity-100 text-red">
            <i class="fa-solid fa-xmark"></i>
        </button>
        </div>
        <div class="p-4 overflow-y-auto overflow-x-hidden dz-scroll">
            <div class="container-fluid px-[15px] py-0">
                <div>
                    <label>Profile Picture</label>
                    <div class="dz-default dlab-message upload-img mb-4">	 
                        <form action="#" class="dropzone border border-dashed border-[#DDDFE1] relative text-center py-[14px] min-h-[6.325rem] rounded-md">
                            <svg width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M27.1666 26.6667L20.4999 20L13.8333 26.6667" stroke="#DADADA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M20.5 20V35" stroke="#DADADA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M34.4833 30.6501C36.1088 29.7638 37.393 28.3615 38.1331 26.6644C38.8731 24.9673 39.027 23.0721 38.5703 21.2779C38.1136 19.4836 37.0724 17.8926 35.6111 16.7558C34.1497 15.619 32.3514 15.0013 30.4999 15.0001H28.3999C27.8955 13.0488 26.9552 11.2373 25.6498 9.70171C24.3445 8.16614 22.708 6.94647 20.8634 6.1344C19.0189 5.32233 17.0142 4.93899 15.0001 5.01319C12.9861 5.0874 11.015 5.61722 9.23523 6.56283C7.45541 7.50844 5.91312 8.84523 4.7243 10.4727C3.53549 12.1002 2.73108 13.9759 2.37157 15.959C2.01205 17.9421 2.10678 19.9809 2.64862 21.9222C3.19047 23.8634 4.16534 25.6565 5.49994 27.1667" stroke="#DADADA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M27.1666 26.6667L20.4999 20L13.8333 26.6667" stroke="#DADADA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div class="fallback">
                                <input name="file" type="file" multiple>
                            </div>
                        </form>
                    </div>	
                </div>
                <div>
                    <div class="row">
                        <div class="xl:w-1/2 mb-4">
                            <label for="exampleFormControlInput1" class="form-label">Employee ID <span class="text-danger">*</span></label>
                            <input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="exampleFormControlInput1" placeholder="">
                        </div>	
                        <div class="xl:w-1/2 mb-4">
                            <label for="exampleFormControlInput2" class="form-label">Employee Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="exampleFormControlInput2" placeholder="">
                        </div>	
                        <div class="xl:w-1/2 mb-4">
                            <label for="exampleFormControlInput3" class="form-label">Employee Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="exampleFormControlInput3" placeholder="">
                        </div>
                        <div class="xl:w-1/2 mb-4 relative">
                            <label class="text-dark">Password</label>
                            <input type="password" id="dz-password" class="form-control relative text-[13px] h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full text-body-color" value="123456">
                            <span class="show-pass eye absolute right-6 bottom-[10px] text-body-color cursor-pointer">
                                <i class="fa fa-eye-slash"></i>
                                <i class="fa fa-eye"></i>
                            </span>
                        </div>
                        <div class="xl:w-1/2 mb-4">
                            <label class="form-label">Designation<span class="text-danger">*</span></label>
                            <select class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]">
                                <option  data-display="Select">Please select</option>
                                <option value="html">Software Engineer</option>
                                <option value="css">Civil Engineer</option>
                                <option value="javascript">Web Doveloper</option>
                            </select>
                        </div>	
                        <div class="xl:w-1/2 mb-4">
                            <label class="form-label">Department<span class="text-danger">*</span></label>
                            <select class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]">
                                <option  data-display="Select">Please select</option>
                                <option value="html">Software</option>
                                <option value="css">Doit</option>
                                <option value="javascript">Designing</option>
                            </select>
                        </div>
                        <div class="xl:w-1/2 mb-4">
                            <label class="form-label">Country<span class="text-danger">*</span></label>
                            <select class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]">
                                <option  data-display="Select">Please select</option>
                                <option value="html">Ind</option>
                                <option value="css">USA</option>
                                <option value="javascript">UK</option>
                            </select>
                        </div>
                        <div class="xl:w-1/2 mb-4">
                            <label for="exampleFormControlInput88" class="form-label">Mobile<span class="text-danger">*</span></label>
                            <input type="number" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="exampleFormControlInput88" placeholder="">
                        </div>
                        <div class="xl:w-1/2 mb-4">
                            <label class="form-label">Gender<span class="text-danger">*</span></label>
                            <select class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]">
                                <option  data-display="Select">Please select</option>
                                <option value="html">Male</option>
                                <option value="css">Female</option>
                                <option value="javascript">Other</option>
                            </select>
                        </div>
                        <div class="xl:w-1/2 mb-4">
                            <label for="exampleFormControlInput99" class="form-label">Joining Date<span class="text-danger">*</span></label>
                            <input type="date" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="exampleFormControlInput99">
                        </div>
                        <div class="xl:w-1/2 mb-4">
                            <label for="exampleFormControlInput8" class="form-label">Date of Birth<span class="text-danger">*</span></label>
                            <input type="date" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="exampleFormControlInput8">
                        </div>
                        <div class="xl:w-1/2 mb-4">
                            <label for="exampleFormControlInput10" class="form-label">Reporting To<span class="text-danger">*</span></label>
                            <input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="exampleFormControlInput10" placeholder="">
                        </div>		
                        <div class="xl:w-1/2 mb-4">
                            <label class="form-label">Language Select<span class="text-danger">*</span></label>
                            <select class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]">
                                <option  data-display="Select">Please select</option>
                                <option value="html">English</option>
                                <option value="css">Hindi</option>
                                <option value="javascript">Canada</option>
                            </select>
                        </div>
                        <div class="xl:w-1/2 mb-4">
                            <label class="form-label">User Role<span class="text-danger">*</span></label>
                            <select class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]">
                                <option  data-display="Select">Please select</option>
                                <option value="html">Parmanent</option>
                                <option value="css">Parttime</option>
                                <option value="javascript">Per Hours</option>
                            </select>
                        </div>
                        <div class="w-full mb-3">
                            <label class="form-label">Address<span class="text-danger">*</span></label>
                            <textarea rows="3" class="form-control relative text-[13px] h-auto min-h-auto border border-b-color block rounded-md p-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full resize-y"></textarea>
                        </div>
                        <div class="w-full mb-3">
                            <label class="form-label">About<span class="text-danger">*</span></label>
                            <textarea rows="3" class="form-control relative text-[13px] h-auto min-h-auto border border-b-color block rounded-md p-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full resize-y"></textarea>
                        </div>	
                    </div>
                    <div>
                        <button class="btn xl:py-[0.719rem] py-2.5 xl:px-[1.563rem] px-4 duration-300 xl:text-[15px] text-[13px] font-medium rounded text-danger bg-danger-light leading-5 inline-block border border-danger-light btn-danger light hover:text-white hover:bg-danger offcanvas-close">Cancel</button>
                        <button class="btn btn-primary xl:py-[0.719rem] py-2.5 xl:px-[1.563rem] px-4 duration-300 xl:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary hover:bg-hover-primary offcanvas-close">Submit</button>
                    </div>
                </div>
            </div>
        </div>
</div>		
      
<div class="fixed top-0 right-0 flex flex-col xl:w-[800px] md:w-[500px] w-[350px] h-[100vh] z-[1045] bg-white dark:bg-[#1E1E1E] text-body-color duration-500 ease-in-out offcanvas is-closed" id="offcanvasExample1">
    <div class="ml-4 flex items-center justify-between p-4">
    <h5 class="modal-title" id="#gridSystemModal1">Add New Task</h5>
        <button type="button" class="offcanvas-close h-6 w-6 box-content bg-danger-light rounded-md text-lg mr-4 p-2 opacity-50 hover:opacity-100 text-red">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <div class="p-4 overflow-y-auto overflow-x-hidden dz-scroll">
        <div class="container-fluid px-[15px] py-0">
            <div>
                <div class="row">
                    <div class="xl:w-1/2 mb-4">
                        <label for="exampleFormControlInputfirst" class="form-label">Title<span class="text-danger">*</span></label>
                        <input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="exampleFormControlInputfirst" placeholder="Title">
                    </div>	
                    <div class="xl:w-1/2 mb-4">
                        <label class="form-label">Project<span class="text-danger">*</span></label>
                        <select class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]">
                            <option  data-display="Select">Project</option>
                            <option value="html">Salesmate</option>
                            <option value="css">ActiveCampaign</option>
                            <option value="javascript">Insightly</option>
                        </select>
                    </div>	
                    <div class="xl:w-1/2 mb-4">
                        <label for="exampleFormControlInputthree" class="form-label">Start Date<span class="text-danger">*</span></label>
                        <input type="date" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="exampleFormControlInputthree">
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label for="exampleFormControlInputfour" class="form-label">End Date<span class="text-danger">*</span></label>
                        <input type="date" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" id="exampleFormControlInputfour">
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label class="form-label">Estimated Hour<span class="text-danger">*</span></label>
                        <div class="flex items-stretch flex-wrap relative w-full">
                            <input type="time" class="w-full relative bg-transparent text-[13px] h-[2.813rem] border border-b-color text-body-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none" value="09:30">
                        </div>  
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label class="form-label">Status<span class="text-danger">*</span></label>
                        <select class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]">
                            <option  data-display="Select">Status</option>
                            <option value="html">In Progess</option>
                            <option value="css">Pending</option>
                            <option value="javascript">Completed</option>
                        </select>
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label class="form-label">priority<span class="text-danger">*</span></label>
                        <select class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]">
                            <option  data-display="Select">priority</option>
                            <option value="html">Hight</option>
                            <option value="css">Medium</option>
                            <option value="javascript">Low</option>
                        </select>
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label class="form-label">Category<span class="text-danger">*</span></label>
                        <select class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]">
                            <option  data-display="Select">Category</option>
                            <option value="html">Designing</option>
                            <option value="css">Development</option>
                            <option value="javascript">react developer</option>
                        </select>
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label class="form-label">Permission<span class="text-danger">*</span></label>
                        <select class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]">
                            <option  data-display="Select">Permission</option>
                            <option value="html">Public</option>
                            <option value="css">Private</option>
                        </select>
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label class="form-label">Deadline add<span class="text-danger">*</span></label>
                        <select class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]">
                            <option  data-display="Select">Deadline</option>
                            <option value="html">Yes</option>
                            <option value="css">No</option>
                        </select>
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label class="form-label">Assigned to<span class="text-danger">*</span></label>
                        <select class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem]">
                            <option  data-display="Select">Assigned</option>
                            <option value="html">Bernard</option>
                            <option value="css">Sergey Brin</option>
                            <option value="javascript"> Larry Ellison</option>
                        </select>
                    </div>
                    <div class="xl:w-1/2 mb-4">
                        <label class="form-label">Responsible Person<span class="text-danger">*</span></label>
                        <input name='tagify' class="form-control py-0 ps-0 h-auto" value='James, Harry'>
                        
                    </div>
                    <div class="w-full mb-3">
                        <label class="form-label">Description<span class="text-danger">*</span></label>
                        <textarea rows="3" class="form-control relative text-[13px] h-auto min-h-auto border border-b-color block rounded-md p-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full resize-y"></textarea>
                    </div>
                    <div class="w-full mb-3">
                        <label class="form-label">Summary<span class="text-danger">*</span></label>
                        <textarea rows="3" class="form-control relative text-[13px] h-auto min-h-auto border border-b-color block rounded-md p-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full resize-y"></textarea>
                    </div>
                    
                </div>
                <div>
                    <button class="btn xl:py-[0.719rem] py-2.5 xl:px-[1.563rem] px-4 duration-300 xl:text-[15px] text-[13px] font-medium rounded text-danger bg-danger-light leading-5 inline-block border border-danger-light btn-danger light hover:text-white hover:bg-danger offcanvas-close">Cancel</button>
                    <button class="btn btn-primary xl:py-[0.719rem] py-2.5 xl:px-[1.563rem] px-4 duration-300 xl:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary hover:bg-hover-primary offcanvas-close">Help Desk</button>
                </div>
            </div>
        </div>
    </div>
</div>
    
<div class="modal fade fixed top-0 right-0 overflow-y-auto overflow-x-hidden dz-scroll w-full h-full z-[1055] translate-y-[-50px] dz-modal-box model-close" id="Employeemodal">
    <div class="modal-dialog modal-dialog-center max-w-[500px] mx-auto my-[1.75rem] w-auto relative pointer-events-none">
        <div class="modal-content mx-[10px] flex flex-col relative rounded-md bg-white dark:bg-[#242424] w-full pointer-events-auto">
            <div class="modal-header flex justify-between items-center flex-wrap py-4 px-[1.875rem] relative z-[2] border-b border-b-color">
                <h1 class="modal-title text-base" id="exampleModalLabel1">Invite Employee</h1>
                <button type="button" class="btn-close p-4"></button>
            </div>
            <div class="modal-body relative p-[1.875rem]">
                    <div class="row">
                        <div class="w-full">
                            <label class="form-label text-[#7a7676] dark:text-white">Email ID<span class="text-danger">*</span></label>
                            <input type="email" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" placeholder="hello@gmail.com">
                            <label class="form-label text-[#7a7676] dark:text-white mt-3">Employment date<span class="text-danger">*</span></label>
                            <input class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" type="date">
                            <div class="row">
                                <div class="xl:w-1/2">
                                    <label class="form-label text-[#7a7676] dark:text-white mt-3">First Name<span class="text-danger">*</span></label>
                                    <div class="flex items-stretch flex-wrap relative w-full">
                                        <input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" placeholder="Name">
                                    </div>
                                </div>
                                <div class="xl:w-1/2">
                                    <label class="form-label text-[#7a7676] dark:text-white mt-3">Last Name<span class="text-danger">*</span></label>
                                    <div class="flex items-stretch flex-wrap relative w-full">
                                        <input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" placeholder="Surname">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 invite">
                                <label class="form-label text-[#7a7676] dark:text-white">Send invitation email<span class="text-danger">*</span></label>
                                <input type ="email" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" placeholder="+ invite">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer flex items-center justify-end flex-wrap py-4 px-[1.875rem] border-t border-b-color">
                <button type="button" class="close-btn btn xl:py-[0.719rem] py-2.5 xl:px-[1.563rem] px-4 m-1 duration-300 xl:text-[15px] text-[13px] font-medium rounded text-danger bg-danger-light leading-5 inline-block border border-danger-light btn-danger light hover:text-white hover:bg-danger">Close</button>
                <button type="button" class="save-btn btn btn-primary xl:py-[0.719rem] py-2.5 xl:px-[1.563rem] px-4 m-1 duration-300 xl:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary hover:bg-hover-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>