package org.healthcare.hospitalapp.interceptor;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import org.springframework.web.servlet.handler.HandlerInterceptorAdapter;

public class AuthenticationInterceptor extends HandlerInterceptorAdapter {

	public boolean preHandle(HttpServletRequest request, 
			HttpServletResponse response, Object handler)
		    throws Exception {
	 HttpServletRequest req = (HttpServletRequest) request;
     HttpServletResponse res = (HttpServletResponse) response;
		HttpSession session = req.getSession(false);
		if ((session == null || session.getAttribute("userAccount") == null || req.getMethod().equalsIgnoreCase("POST"))&&!(req.getContextPath().equalsIgnoreCase("/hospitalapp")) ) {
	        res.sendRedirect(req.getContextPath()+"/backLogin"); // No logged-in user found, so redirect to login page.
	        res.setHeader("Cache-Control", "no-cache, no-store, must-revalidate"); // HTTP 1.1.
	        res.setHeader("Pragma", "no-cache"); // HTTP 1.0.
	        res.setDateHeader("Expires", 0);
	        return false;
		}
	 
			return true;
		}
}
