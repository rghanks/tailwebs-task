<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\student as StudentModel;
use Livewire\Attributes\Validate;

class Student extends Component
{
    #[Validate('required')]
    public $name = '';
 
    #[Validate('required')]
    public $subject = '';

    #[Validate('required|numeric|min:0|max:100')]
    public $marks = '';

    public $student_id;

    public function save()
    {
        $this->validate();

        $student = StudentModel::where([['name','=',$this->name],['subject','=', $this->subject]])->first();
        if($student){

            // dd($student);
            StudentModel::where('id',$student->id)->update([
                'name' => $this->name,
                'subject' => $this->subject,
                'marks' => $this->marks
             ]);

            $this->reset(); 

            return redirect()->route('account.dashboard')->with('success','Record updated successfully.');

        }else{
            StudentModel::create($this->all());
 
            $this->reset(); 

            return redirect()->route('account.dashboard')->with('success','New record added successfully.');
        }
       
 
        
    }

    public function delete($student_id){
        $student = StudentModel::find($student_id);  
        $student->delete();
        return redirect()->route('account.dashboard')->with('success','Record deleted successfully.');
    }

    public function editStudent($student_id){
        $student = StudentModel::find($student_id); 
        if($student){
            $this->student_id = $student->id;
            $this->name = $student->name;
            $this->subject = $student->subject;
            $this->marks = $student->marks;
        }
    }

    public function updateStudent(){
        $this->validate();

        StudentModel::where('id',$this->student_id)->update([
           'name' => $this->name,
           'subject' => $this->subject,
           'marks' => $this->marks
        ]);

        return redirect()->route('account.dashboard')->with('success','Record updated successfully.');
        
    }

    public function addStudent(){
            $this->student_id = '';
            $this->name = '';
            $this->subject = '';
            $this->marks = '';
    }
    
    public function render()
    {
        return view('livewire.student')->with(['students' => StudentModel::all()]);
    }
}
