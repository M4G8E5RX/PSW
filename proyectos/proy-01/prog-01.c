
#include <stdio.h>
int main(int argc, char const *argv[])
{
    char car;
    scanf ("%c", &car);

    if (car >='A' && car <='Z')
        printf("MAYUSCULA");
    else if (car>='a' && car <='z')
        printf("MINUSCULA");
    else
        printf("OTRO");
    


    return 0;
}
