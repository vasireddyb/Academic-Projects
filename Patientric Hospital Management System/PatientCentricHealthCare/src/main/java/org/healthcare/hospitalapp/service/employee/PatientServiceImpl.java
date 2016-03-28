package org.healthcare.hospitalapp.service.employee;

import java.util.Iterator;
import java.util.List;

import org.healthcare.hospitalapp.data.PatientDAO;
import org.healthcare.hospitalapp.data.UserAccountDAO;
import org.healthcare.hospitalapp.model.employee.UserAccount;
import org.healthcare.hospitalapp.model.encounter.Encounter;
import org.healthcare.hospitalapp.model.workrequest.ConsultationWorkRequest;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class PatientServiceImpl implements IPatientService {
	@Autowired
	PatientDAO patientDAO;
	@Autowired
	UserAccountDAO userAccountDAO;
	
	@Override
	public boolean addPatient(UserAccount userAccount) {
		List<UserAccount> users = userAccountDAO.getAllUserAccountList();
		for (Iterator iterator = users.iterator(); iterator.hasNext();) {
			UserAccount userAcc = (UserAccount) iterator.next();
			if(userAcc.getUsername().equals(userAccount.getUsername()))
			{
				return false;
			}
		}
		userAccount.setRole("PATIENT");
		patientDAO.addPatient(userAccount);
		return true;
	}

	@Override
	public void sendComplaint(ConsultationWorkRequest consult, int userId, UserAccount patient) {
		patientDAO.sendComplaint(consult,userId,patient);
	}
	@Override
	public List<Encounter> checkReport(UserAccount patient) {
		List<Encounter> encounterList =  patientDAO.checkReport(patient);
		return encounterList;
	}
	
	/*public void sendMail(){
		
		Properties props = new Properties();
		props.put("mail.smtp.auth", "true");
		props.put("mail.smtp.starttls.enable", "true");
		props.put("mail.smtp.host", "smtp.gmail.com");
		props.put("mail.smtp.port", "587");
		final String usernameForAuth = StringConstants.STRINGMAIL;
		final String passwordForAuth = StringConstants.STRINGPASS;
		Session session = Session.getInstance(props,
				new javax.mail.Authenticator() {
					protected PasswordAuthentication getPasswordAuthentication() {
						return new PasswordAuthentication(usernameForAuth,
								passwordForAuth);
					}
				});

		try {

			Message message = new MimeMessage(session);
			message.setFrom(new InternetAddress(StringConstants.STRINGMAIL));
			message.setRecipients(
					Message.RecipientType.TO,
					InternetAddress
							.parse(patient.getEmail()));

			message.setSubject("! Important Notification From "+enterprise.getName()+": ");
			BodyPart messageBodyPart = new MimeBodyPart();

			// Now set the actual message
			messageBodyPart
					.setText("Dear "+patient.getFirstName()+", \n \n"
                                                +"This is to notify you that, you now have a profile in "+enterprise.getName()+" \n "
                                                + "and your primary consultation doctor will be "+patient.getPrimaryDoctor().getFirstName()+" \n"
                                                +" You are always welcome to contact him at his e-mail "+patient.getPrimaryDoctor().geteMail()+" \n"
                                                + " And his mobile during office timings at "+patient.getPrimaryDoctor().getPhoneNumber()+" "
                                                + "You can call or mail him on any adverse events during any medication process. \n"
                                                + "\n Please fill the attached form and submit to the doctor, to share the health Information."
                                                + "\n Have a nice Day..!!"
                                                + "\n \n "+enterprise.getName()+"");

			// Create a multipar message
			Multipart multipart = new MimeMultipart();

			// Set text message part
			multipart.addBodyPart(messageBodyPart);

			// Part two is attachment
			messageBodyPart = new MimeBodyPart();
                        // to attach a file for the hospital
			String filename = "HealthInformationForm.pdf";
			DataSource source = new FileDataSource(filename);
			messageBodyPart.setDataHandler(new DataHandler(source));
			messageBodyPart.setFileName(filename);
			multipart.addBodyPart(messageBodyPart);

			// Send the complete message parts
			message.setContent(multipart);
			Transport.send(message);

		} catch (MessagingException e) {
                        throw new RuntimeException(e);
		}
	}*/
}
