#include<stdio.h>
#include<conio.h>

int main(){
    int i=0;
    float x,pi=0;
    do{
        printf ("nhap so epsilon");
        scanf ("%f",&x);
        if (x>=1 || x<= 0) printf ("so epsilon nam trong khoang (0;1). nhap lai");
    } while ( x>=1 || x<= 0);
    do {
        pi+= pow (-1,i)* (1/(2*i+1));
        i++;
    } while (1/(2*i+1)>=x);
    printf ("so pi = %5.4f",4*pi);
    return 0;
}