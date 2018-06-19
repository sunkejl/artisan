The format specification 
d,i integer printf ("%d",10); /∗prints 10∗/ 
x,X integer (hex) printf ("%x",10); /∗print 0xa∗/ 
u unsigned integer printf ("%u",10); /∗prints 10∗/ 
c character printf ("%c",’A’); /∗prints A∗/ 
s string printf ("%s","hello"); /∗prints hello∗/ 
f float printf ("%f",2.3); /∗prints 2.3∗/ 
d double printf ("%d",2.3); /∗prints 2.3∗/ 
e,E float(exp) 1e3,1.2E3,1E−3 
% literal % printf ("%d%%",10); /∗prints 10%∗/



printf ("%d",x) scanf("%d",&x) 
printf ("%10d",x) scanf("%d",&x) 
printf ("%f",f) scanf("%f",&f) 
printf ("%s",str) scanf("%s",str) /∗note no & required∗/ 
printf ("%s",str) scanf("%20s",str) /∗note no & required∗/ 
printf ("%s%s",fname,lname) scanf("%20s%20s",fname,lname)


