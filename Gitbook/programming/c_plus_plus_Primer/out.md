```
#include <iostream>
int main(){
    int a;
    std::cin >>a;
    std::cout << "abc" <<a;
}
g++ a.cpp -o a.o
```

```
#include <iostream>
#include <string>
using std::string;
using std::cout;
using std::cin;
int main(){
    int a;
    string i="aa";
    cout << i ;
    cin >>a;
    cout << "abc" <<a;
}
```

```
#include <iostream>
using std::string;
using std::cout;
using std::cin;
using std::endl;
int main(){
    string s;
    while (getline(cin,s)){
        cout << s << endl;
    }
    return 0;
}
```
