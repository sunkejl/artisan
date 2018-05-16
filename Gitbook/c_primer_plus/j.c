#include <stdio.h>
void main(){
		char	 ch[100];

		FILE * fp;
		fp=fopen("1.md","r+");
		fgets(ch,100,fp);
		printf("%s",ch);
}
