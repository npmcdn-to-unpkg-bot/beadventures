from django.shortcuts import render_to_response, render
from django.views.decorators.csrf import csrf_exempt
from django.core.mail import EmailMessage
from django.http import HttpResponse

def index(request):
    return render(request,'test.html')

def index_new(request):
    return render(request,'test.html')

@csrf_exempt
def email(request):

    comment = request.POST['comment']
    first_name=request.POST['first_name']
    last_name=request.POST['last_name']
    to = ['andrew-edwards@live.com']
    from_email = request.POST['email']
    body= 'From: ' + first_name + ' ' + last_name + '\n' + 'Return Email: ' + from_email + '\n' + 'Message: '  + comment

    EmailMessage('beadventures enquiry', body, to=to).send()

    return HttpResponse('email sent.')