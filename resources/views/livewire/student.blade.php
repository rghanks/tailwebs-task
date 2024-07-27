<div>
<div class="main">
    <div class="container"> 

        @if(Session::has('success'))
            <div class="alert alert-success">
            {{ Session::get('success') }}
            </div>
        @endif
        <div class="card-body">        
            <table>
                <tr>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Marks</th>
                    <th>Action</th>
                </tr>

                @foreach($students as $student)

                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->subject }}</td>
                    <td>{{ $student->marks }}</td>
                    <td>
                        <div class="dropdown">
                                <img src="/icons/down-arrow.png" width="25px" />
                                <div class="dropdown-content">
                                    <ul>
                                        <li><a wire:click="editStudent({{ $student->id }})" href="#update-popup-box">Edit</a></li>
                                        <li><a  x-on:click="$wire.delete({{ $student->id }})"
                                        wire:confirm="Are you sure you want to delete this post?" href="#">Delete</a></li>
                                    </ul>
                                </div>
                        </div>
                    </td>
                </tr>

                @endforeach                
                       
            </table>
        </div> 
        <br/>
        <a wire:click="addStudent" href="#popup-box"> <button> Add </button></a>    
        </div>
   </div>


   <!-- Add New Record -->
   <div id="popup-box" class="modal">
         <div class="content">       
            <form wire:submit="save" autocomplete="off" >
                @csrf
                <div class="login-form"> 
                
                            <a href="#" class="close-modal">&times;</a>
                                <div class="icon-username">
                                    <label for="name">Name</label>
                                    <input type="text" value="{{ old('name') }}"  wire:model="name" name="name" id="name" placeholder="Name">
                                    @error('name')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="icon-subject">
                                    <label for="username">Subject</label>
                                    <input type="text" name="subject"  wire:model="subject" value="{{ old('subject') }}" id="subject" placeholder="Subject">
                                    @error('subject')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>   
                                <div class="icon-marks">
                                    <label for="username">Marks</label>
                                    <input type="text" name="marks" wire:model="marks" value="{{ old('marks') }}" id="marks" placeholder="Marks"> 
                                    @error('marks')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror                                   
                                </div>    
                                
                                <button type="submit">Add</button>        
                </div>
            </form>
        </div>  
    </div>

    <!-- Update Record -->

    <div id="update-popup-box" class="modal">
         <div class="content">       
            <form wire:submit="updateStudent" autocomplete="off" >
                @csrf
                <div class="login-form"> 
               
                            <a href="#" class="close-modal">&times;</a>
                                <div class="icon-username">
                                    <label for="name">Name</label>
                                    <input type="text" value="{{ old('name') }}"  wire:model="name" name="name" id="name" placeholder="Name">
                                    @error('name')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="icon-subject">
                                    <label for="username">Subject</label>
                                    <input type="text" name="subject"  wire:model="subject" value="{{ old('subject') }}" id="subject" placeholder="Subject">
                                    @error('subject')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>   
                                <div class="icon-marks">
                                    <label for="username">Marks</label>
                                    <input type="text" name="marks" wire:model="marks" value="{{ old('marks') }}" id="marks" placeholder="Marks"> 
                                    @error('marks')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror                                   
                                </div>    
                                
                                <button type="submit">Update</button>        
                </div>
            </form>
        </div>  
    </div>

</div>