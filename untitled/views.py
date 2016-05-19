from django.shortcuts import render_to_response, render

def index(request):
    return render(request,'index.html')

def index_new(request):
    return render(request,'index_new.html')

def email(request):
    return render()

from django.conf import settings
from django.core.mail import send_mail
from django.views.generic import FormView

from untitled.forms import ContactForm

class ContactFormView(FormView):

    form_class = ContactForm
    template_name = "email_form.html"
    success_url = '/email-sent/'

    def form_valid(self, form):
        message = "{name} / {email} said: ".format(
            name=form.cleaned_data.get('name'),
            email=form.cleaned_data.get('email'))
        message += "\n\n{0}".format(form.cleaned_data.get('message'))
        send_mail(
            subject=form.cleaned_data.get('subject').strip(),
            message=message,
            from_email='contact-form@myapp.com',
            recipient_list=['andrew-edwards@live.com'],
        )
        return super(ContactFormView, self).form_valid(form)