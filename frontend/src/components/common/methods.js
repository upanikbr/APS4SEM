function isInt(number){
    if(!isNaN(number) && parseInt(number)){
        return true
    } 
    return false
}

function dateInputText(){ /*transform a value input text in date value for html*/

}

function easyDate(date){/*create a easy obj for using in meetings*/
    let year = 0
    let month = 0
    let day = 0
    let hour = 0
    let minutes = 0
    let seconds = 0

    year = date.getFullYear()
    month = date.getMonth()
    day = date.getDate()
    hour = date.getHours()
    minutes = date.getMinutes()
    seconds = date.getSeconds()
    
    return { year, month, day, hour, minutes, seconds,
        brdt:`${day}/${month}/${year}`,
        brhr:`${hour<10 ? 0:''}${hour}:${minutes<10 ? 0: ''}${minutes}:${seconds<10 ? 0:''}${seconds}`
    }
}




module.exports = { easyDate, isInt, dateInputText }