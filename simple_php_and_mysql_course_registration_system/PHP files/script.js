function loginClicked(studName, studID){
    if(studName.length == 0 && studID.length == 0){
        alert("ERROR\nYou didn't specify UserName and Password");
    }
    else if(studName.length == 0){
        alert("ERROR\nYou didn't specify UserName");
    }
    else if(studID.length == 0){
        alert("ERROR\nYou didn't specifyPassword");
    }
    else{
        //studName and studID will be controlled in database
    }
}