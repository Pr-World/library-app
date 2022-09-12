const name = $('#name')
const date = $('#date')
const price = $('#price')
const select = $('#select')
const submit = $('#submit')

select.attr('correct', false)
name.attr('correct', false)
date.attr('correct', false)
price.attr('correct', false)

// validate name
name.on('click keyup change', () => {
	var c = /[A-Z,a-z]{3,} [A-Z,a-z]{3,}/.test(name.val())
	name.attr('pattern', c ? '.*' : '[A-Z,a-z]{3,} [A-Z,a-z]{3,}')
	name.attr('correct', c)
	console.log(c)
	name.css({'border-bottom-color': c ? 'lightgreen' : 'red'})
})

// selection and update price
select.on('focus click', () => {
	if(!select.attr('removed')){
		select.children().first().remove()
		select.attr('removed', true)
		select.attr('correct', true)
		select.css({'border-bottom-color':'lightgreen'})
	}
	$.get('?price_query='+select.children('option:selected').val(), (data) => {
		price.val('$' + data)
	})
})

// date update
date.on('focus click change', () => {
	var dt = new Date()
	var dt1 = 365*dt.getFullYear() + 30*(dt.getMonth()+1) + dt.getDate()

	dt = date.val()
	var dt2 = parseInt(365*dt.slice(0,4)) + parseInt(30*dt.slice(5,7)) +
	parseInt(dt.slice(8,10))

	c = true
	// should not be less than today + 5 days or be greater than 30 days + today
	// and should be a valid date
	if (( dt2-5 <= dt1 || dt2 > dt1+30 ) || !dt2 )
		c = false

	date.attr('correct', c)
	date.css({'border-bottom-color': c ? 'lightgreen' : 'red'})
})

// on submit
submit.on('click', (e) => {
	e.preventDefault()
	var allset = true
	// check all things to be correct
	if (name.attr('correct')!='true'){
		allset = false; alert('Invalid name !'); return;
	}
	if (select.attr('correct')!='true'){
		allset = false; alert('Invalid selection !'); return;
	}
	if (date.attr('correct')!='true'){
		allset = false; alert('Invalid date !'); return;
	}
	if (allset)
	{
		$.post('?order_book='+select.children('option:selected').val(), {
			'uname':name.val(),
			'date':date.val()
		}, (data) => {
			alert("Response in return :-\n"+data);
		})
		window.location = '? '
	}
})