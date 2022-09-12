const name = '#name'
const email = '#email'
const passw = '#passw'
const submit = '#submit'
const date = '#date'

check = function(a, b, c=()=>{}){a.length==0?c():b()}

score = (pass)=>{
    var score = 0;
    if (!pass)
        return score;

    // award every unique letter until 5 repetitions
    var letters = new Object();
    for (var i=0; i<pass.length; i++) {
        letters[pass[i]] = (letters[pass[i]] || 0) + 1;
        score += 5.0 / letters[pass[i]];
    }

    // bonus points for mixing it up
    var variations = {
        digits: /\d/.test(pass),
        lower: /[a-z]/.test(pass),
        upper: /[A-Z]/.test(pass),
        nonWords: /\W/.test(pass),
    }

    var variationCount = 0;
    for (var check in variations) {
        variationCount += (variations[check] == true) ? 1 : 0;
    }
    score += (variationCount - 1) * 10;

    return parseInt(score);
}

load = ()=>{

check($(name), ()=>{
	$(name).attr('correct', false)
	$(name).on('focus keyup change', ()=>{
		$(name).attr(
			'correct',
			/[A-Za-z]{3,} [A-Za-z]{3,}/.test($(name).val())
		)
		$(name).css(
			$(name).attr('correct')=='true'?{'border-bottom-color':'lightgreen'}:
			{'border-bottom-color':'red'}
		)
	})
},()=>{
	console.log(name, "not found in check()!")
})

check($(email), ()=>{
	$(email).attr('correct', false)
	$(email).on('focus keyup change', ()=>{
		$(email).attr(
			'correct',
			/[A-Za-z0-9\-,\~\`\.]*\@[A-Za-z0-9\.]*\.[A-Za-z0-9]*/.test($(email).val())
		)
		$(email).css(
			$(email).attr('correct')=='true'?{'border-bottom-color':'lightgreen'}:
			{'border-bottom-color':'red'}
		)
	})
},()=>{
	console.log(email, "not found in check()!")
})

check($(passw), ()=>{
	$(passw).attr('correct', false)
	$(passw).on('focus keyup change', ()=>{
		var sc = score($(passw).val())

		var c = sc<30?'red':sc<50?'orange':sc<70?'yellow':'lightgreen'

		$(passw).attr('correct', sc>=70)
		$(passw).css({'border-bottom-color':c})
	})
},()=>{
	console.log(passw, "not found in check()!")
})

check($(date), ()=>{
	$(date).attr('correct', false)
	$(date).on('focus keyup change', ()=>{
		var mxdays = parseInt($(date).attr('maxdays'))
		var mndays = parseInt($(date).attr('mindays'))
		var cdt = $(date).val()

		var dt = new Date()
		var td = dt.getFullYear()*365+(dt.getMonth()+1)*30+dt.getDate()+1
		
		var cd = parseInt(cdt.slice(0,4))*365+parseInt(cdt.slice(5,7))*30+
		parseInt(cdt.slice(8,10))

		var c = cd>(td-mndays) && cd<(td+mxdays)

		$(date).attr('correct', c)
		$(date).css({'border-bottom-color':c?'lightgreen':'red'})

	})
}, function(){
	console.log(date, "not found in check()!")	
})

}